<?php

namespace spkm\IsamsApi\Generator\Naming;

use Illuminate\Support\Str;
use spkm\IsamsApi\Generator\ApiSpec;
use spkm\IsamsApi\Generator\Corrections;

/**
 * Names a generated request from its operation: the namespace from its tag, the class from the verb, the resource and
 * the action, and a suffix from the path where two would clash.
 */
final class RequestNaming
{
    private const VERBS = ['get' => 'Get', 'post' => 'Create', 'put' => 'Update', 'patch' => 'Patch', 'delete' => 'Delete'];

    private const STANDARD_ACTIONS = ['Get', 'GetAll', 'Post', 'Put', 'Patch', 'Delete', 'Create', 'Update'];

    public function __construct(private readonly ApiSpec $spec, private readonly Corrections $corrections) {}

    /**
     * @return array{area: string, middle: list<string>, resource: string}
     */
    public function tagParts(string $tag): array
    {
        $parts = explode(' - ', ApiSpec::cleanTag($tag));
        $resource = count($parts) > 1 ? (string) end($parts) : '';

        return [
            'area' => $parts[0],
            'middle' => array_values(array_diff(array_slice($parts, 1, -1), $this->corrections->ignoredTagSegments())),
            'resource' => $this->commandsResource($parts[0], $resource),
        ];
    }

    /**
     * "X Commands" tags share X's namespace, or its plural's when the area has a tag for that.
     */
    private function commandsResource(string $area, string $resource): string
    {
        if (! str_ends_with($resource, ' Commands')) {
            return $resource;
        }

        $resource = substr($resource, 0, -strlen(' Commands'));

        return in_array($area.' - '.Str::plural($resource), $this->spec->tags(), true) ? Str::plural($resource) : $resource;
    }

    public function namespaceFor(string $tag): string
    {
        $parts = $this->tagParts($tag);
        $words = array_values(array_filter(explode(' ', $parts['resource'])));
        $nouns = $this->corrections->areaNouns($parts['area']);

        while ($words !== [] && in_array($words[0], $nouns, true)) {
            array_shift($words);
        }

        $segments = [$this->areaName($parts['area'])];
        $ancestors = array_map(Words::singular(...), [...Words::of($segments[0]), ...explode(' ', $parts['area'])]);

        foreach ([...$parts['middle'], implode(' ', $words)] as $segment) {
            $segmentWords = $this->withoutNoise($parts['area'], array_values(array_filter(explode(' ', $segment))));

            $areaHead = Words::singular((string) last(explode(' ', $parts['area'])));

            while ($segmentWords !== [] && in_array(Words::singular($segmentWords[0]), $ancestors, true)
                && (count($segmentWords) > 1 || Words::singular($segmentWords[0]) === $areaHead)) {
                array_shift($segmentWords);
            }

            if ($segmentWords !== [] && ! str_ends_with((string) end($segments), Words::studly(implode(' ', $segmentWords)))) {
                $segments[] = Words::studly(implode(' ', $segmentWords));
                $ancestors = [...$ancestors, ...array_map(Words::singular(...), $segmentWords)];
            }
        }

        return 'spkm\IsamsApi\Requests\\'.implode('\\', $segments);
    }

    /**
     * The words without the area's noise words (overrides "noiseWords"), which iSAMS adds to names without meaning.
     *
     * @param  list<string>  $words
     * @return list<string>
     */
    private function withoutNoise(string $area, array $words): array
    {
        $noise = array_map(Words::singular(...), $this->corrections->noiseWords($area));

        return array_values(array_filter($words, fn (string $word) => ! in_array(Words::singular($word), $noise, true)));
    }

    private function areaName(string $area): string
    {
        return $this->corrections->areaName($area) ?? Words::studly($area);
    }

    /**
     * @param  array<string, mixed>  $operation
     * @param  array<string, mixed>  $response
     * @param  array<string, mixed>  $parameters
     */
    public function className(array $operation, array $response, array $parameters): string
    {
        $tag = $this->tagParts($operation['tag']);
        $words = $this->withoutNoise($tag['area'], explode(' ', $tag['resource'] ?: $tag['area'])) ?: explode(' ', $tag['resource'] ?: $tag['area']);
        $head = (string) end($words);
        $uncountable = in_array($head, $this->corrections->uncountable(), true);
        $plural = Words::studly(implode(' ', [...array_slice($words, 0, -1), $uncountable ? $head : Str::plural(Str::singular($head))]));
        $singular = Words::studly(implode(' ', [...array_slice($words, 0, -1), $uncountable ? $head : Str::singular($head)]));
        $action = $this->action($operation['spec']);
        $bodyIsList = ($parameters['body']['list'] ?? false) === true;

        if (in_array($action, self::STANDARD_ACTIONS, true)) {
            $method = $operation['method'];
            $verb = self::VERBS[$method];
            $endsWithParameter = str_ends_with($operation['path'], '}');

            if ($method === 'post' && $parameters['body'] === null && $endsWithParameter) {
                $verb = 'Add';
            } elseif ($method === 'delete' && $endsWithParameter && $this->spec->hasBodylessPost($operation['path'])) {
                $verb = 'Remove';
            }

            preg_match('/\{(\w+)\}$/', $operation['path'], $lastParameter);
            $endsWithOwnId = isset($lastParameter[1]) && ($lastParameter[1] === 'id' || str_ends_with(strtolower($lastParameter[1]), strtolower(Str::singular($head)).'id'));

            $noun = match ($method) {
                'get' => $response['shape'] === 'list' && ! $endsWithOwnId ? $plural : $singular,
                default => $bodyIsList ? $plural : $singular,
            };

            return $verb.$noun.'Request';
        }

        $name = Words::studly($action);

        if (! str_contains($name, $singular) && ! str_contains($name, $plural)) {
            preg_match_all('/[A-Z][a-z]*/', $name, $actionWords);
            [$verb, $rest] = [$actionWords[0][0] ?? '', array_slice($actionWords[0], 1)];
            $noun = $singular;

            for ($count = count($words); $count > 0; $count--) {
                $tail = array_slice($words, -$count);
                $start = array_slice($rest, 0, $count);

                if ($start !== [] && Words::studly(Str::singular(implode(' ', $tail))) === Str::singular(implode('', $start))) {
                    $noun = Words::studly(implode(' ', array_slice($words, 0, -$count)));
                    break;
                }
            }

            $name = (string) preg_replace('/^([A-Z][a-z]*)/', '$1'.$noun, $name);
        }

        if (($parameters['body']['kind'] ?? null) === 'patch') {
            $name = (string) preg_replace('/^Update(?=[A-Z])/', 'Patch', $name);
        }

        return $name.'Request';
    }

    /**
     * A clashing request name told apart by its path: ByLastParameter when the path ends in a parameter, otherwise its
     * last fixed segment.
     */
    public function disambiguate(string $class, string $path): string
    {
        preg_match_all('/\{(\w+)\}/', $path, $parameters);
        $segments = array_values(array_filter(explode('/', $path), fn (string $segment) => $segment !== '' && ! str_starts_with($segment, '{')));
        $suffix = str_ends_with($path, '}') && $parameters[1] !== []
            ? 'By'.ucfirst((string) end($parameters[1]))
            : Words::studly((string) end($segments));

        return (string) preg_replace('/Request$/', $suffix.'Request', $class);
    }

    /**
     * @param  array<string, mixed>  $spec
     */
    private function action(array $spec): string
    {
        $action = Str::after($spec['operationId'], '_');
        $names = array_values(array_map(
            fn (array $parameter) => ucfirst(strtolower((string) $parameter['name'])),
            array_filter($spec['parameters'] ?? [], fn (array $parameter) => ! in_array($parameter['name'], [...ApiSpec::IGNORED_PARAMETERS, '$filter'], true)),
        ));

        for ($count = count($names); $count > 0; $count--) {
            $suffix = 'By'.implode('', array_slice($names, 0, $count));

            if (str_ends_with($action, $suffix)) {
                $action = substr($action, 0, -strlen($suffix));
                break;
            }
        }

        return (string) preg_replace(['/Async$/', '/^GetAll(?=[A-Z])/', '/(?<=^Get)ById$/'], ['', 'Get', ''], $action);
    }
}
