<?php

namespace spkm\IsamsApi\Generator\Naming;

use Illuminate\Support\Str;
use spkm\IsamsApi\Generator\Corrections;

/**
 * Names the resource class a request namespace maps to, that resource's parent, and the method a request becomes on
 * it.
 */
final class ResourceNaming
{
    public function __construct(private readonly Corrections $corrections, private readonly RequestNaming $requestNaming) {}

    /**
     * The resource class for a request namespace: Requests\A\B\C is Resources\A\B\CResource.
     */
    public function resourceFor(string $requestNamespace): string
    {
        return 'spkm\IsamsApi\Resources\\'.Str::after($requestNamespace, 'spkm\IsamsApi\Requests\\').'Resource';
    }

    public function parentResource(string $resource): ?string
    {
        $path = Str::after(Str::beforeLast($resource, 'Resource'), 'spkm\IsamsApi\Resources\\');

        return str_contains($path, '\\') ? 'spkm\IsamsApi\Resources\\'.Str::beforeLast($path, '\\').'Resource' : null;
    }

    /**
     * A resource method's name: the request's action without the noun its resource already names. A list is all(), a
     * single item get(), and other actions keep their words: archive(), moveToAlumni(), getCurrent().
     */
    public function actionName(string $requestClass, string $requestNamespace, string $tag, string $path): string
    {
        $area = $this->requestNaming->tagParts($tag)['area'];
        $segments = array_values(array_filter(explode('\\', Str::after($requestNamespace, 'spkm\IsamsApi\Requests\\')), fn (string $segment) => preg_match('/^V\d+$/', $segment) !== 1));
        $areaNouns = $this->corrections->areaNouns($area);
        $nouns = array_map(Words::singular(...), [
            ...array_merge(...array_map(Words::of(...), $segments)),
            ...$areaNouns,
            ...$this->corrections->noiseWords($area),
            ...explode(' ', $area),
            ...(preg_match_all('#/([A-Za-z]+)/\{#', $path, $collections) ? $collections[1] : []),
        ]);
        $words = Words::of(Str::beforeLast(class_basename($requestClass), 'Request'));
        $verb = (string) array_shift($words);
        $isNoun = fn (string $word) => in_array(Words::singular($word), $nouns, true);
        $heads = array_map(Words::singular(...), [(string) last(Words::of((string) end($segments))), ...(count($segments) === 1 ? $areaNouns : [])]);
        $head = collect($heads)->first(fn (string $candidate) => in_array($candidate, array_map(Words::singular(...), $words), true)) ?? $heads[0];

        $end = 0;
        while ($end < count($words) && $isNoun($words[$end])) {
            $end++;
        }
        $start = 0;

        if (! in_array($head, array_map(Words::singular(...), array_slice($words, 0, $end)), true)) {
            $last = null;
            foreach ($words as $index => $word) {
                if (Words::singular($word) === $head) {
                    $last = $index;
                }
            }

            if ($last === null) {
                return lcfirst($verb.implode('', $words));
            }

            [$start, $end] = [$last, $last + 1];
            while ($start > 0 && $isNoun($words[$start - 1])) {
                $start--;
            }
        }

        $noun = array_slice($words, $start, $end - $start);
        $rest = [...array_slice($words, 0, $start), ...array_slice($words, $end)];

        $byId = array_search('By', $rest, true);

        if ($byId !== false && end($rest) === 'Id') {
            $rest = array_slice($rest, 0, $byId);
        }

        if ($start > 0 && $end === count($words)) {
            while ($rest !== [] && in_array(end($rest), ['To', 'From', 'For', 'By', 'In', 'Of', 'With', 'On', 'At'], true)) {
                array_pop($rest);
            }
        }

        $isPlural = $noun !== [] && ! in_array(end($noun), $this->corrections->uncountable(), true) && Str::singular((string) end($noun)) !== end($noun);

        return match (true) {
            $verb === 'Get' && ($rest === [] || $rest === ['All']) => $isPlural || $rest === ['All'] ? 'all' : 'get',
            $rest === [] && $isPlural && in_array($verb, ['Create', 'Update', 'Patch', 'Delete'], true) => lcfirst($verb).'Many',
            default => lcfirst($verb.implode('', $rest)),
        };
    }
}
