<?php

namespace spkm\IsamsApi\Generator;

use ReflectionClass;
use RuntimeException;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * generator/overrides.php, read once and checked: the keys and operation settings it may hold, the shape each takes
 * and, given the spec, what each must name. The generators read the file through this class only.
 */
final class Corrections
{
    /** Each key the file may hold and the shape of its value. */
    public const KEYS = [
        'areas' => 'list<string>',
        'areaNames' => 'map<string>',
        'areaNouns' => 'map<list<string>>',
        'noiseWords' => 'map<list<string>>',
        'ignoredTagSegments' => 'list<string>',
        'uncountable' => 'list<string>',
        'modules' => 'map<string>',
        'models' => 'map<string>',
        'enums' => 'map<string>',
        'properties' => 'map<map<array>>',
        'operations' => 'map<array>',
        'batchMethods' => 'map<string>',
        'batchModels' => 'map<map<string>>',
    ];

    /** Each setting an operation may hold and the shape of its value. */
    public const SETTINGS = [
        'class' => 'class name',
        'method' => 'method name',
        'response' => 'response',
        'required' => 'list<string>',
        'cacheable' => 'bool',
        'safe' => 'bool',
        'paginatable' => 'bool',
        'multipart' => 'map<string>',
        'handwritten' => 'string',
        'skip' => 'string',
    ];

    /** The settings only a generated request reads. */
    private const GENERATED_ONLY = ['class', 'cacheable', 'safe', 'paginatable', 'required', 'multipart'];

    private const DESCRIPTIONS = [
        'string' => 'a string',
        'bool' => 'true or false',
        'class name' => 'a class name ending in Request',
        'method name' => 'a method name',
        'list<string>' => 'a list of strings',
        'map<string>' => 'a map of names to strings',
        'map<array>' => 'a map of names to arrays',
        'map<list<string>>' => 'a map of names to lists of strings',
        'map<map<string>>' => 'a map of names to maps of strings',
        'map<map<array>>' => 'a map of names to maps of arrays',
    ];

    /**
     * @param  array<string, mixed>  $overrides  what generator/overrides.php returns
     */
    public function __construct(private readonly array $overrides)
    {
        $this->rejectUnreadable();
    }

    public static function load(string $root): self
    {
        return new self((array) require $root.'/generator/overrides.php');
    }

    /**
     * Fails when an override names something the spec does not have, so a correction is never silently lost when the
     * pinned spec is updated, or sits on an operation nothing generates.
     */
    public function validateAgainst(ApiSpec $spec): void
    {
        $operations = array_column($spec->operations(), null, 'id');
        $areas = $spec->areas();
        $problems = [];

        foreach ($this->operations() as $id => $override) {
            $operation = $operations[$id] ?? null;

            if ($operation === null) {
                $problems[] = "operations.$id: no such operation in the spec";
            }

            $parameters = $operation['spec']['parameters'] ?? [];
            $query = array_column(array_filter($parameters, fn (array $parameter) => ($parameter['in'] ?? null) === 'query'), 'name');
            $parts = array_column(array_filter($parameters, fn (array $parameter) => ($parameter['in'] ?? null) === 'formData'), 'name');

            foreach (array_diff($override['required'] ?? [], $query) as $parameter) {
                $problems[] = "operations.$id.required: no query parameter $parameter";
            }

            foreach ($override['multipart'] ?? [] as $part => $definition) {
                if (! in_array($part, $parts, true)) {
                    $problems[] = "operations.$id.multipart: no formData part $part";
                }

                if ($spec->definition($definition) === null) {
                    $problems[] = "operations.$id.multipart: no such definition $definition";
                }
            }

            foreach (array_filter([$override['response']['definition'] ?? null, $override['response']['list'] ?? null]) as $definition) {
                if ($spec->definition($definition) === null) {
                    $problems[] = "operations.$id.response: no such definition $definition";
                }
            }

            if (isset($override['handwritten']) && ! class_exists($override['handwritten'])) {
                $problems[] = "operations.$id.handwritten: no class {$override['handwritten']}";
            } elseif (isset($override['handwritten']) && ! is_subclass_of($override['handwritten'], IsamsRequest::class)) {
                $problems[] = "operations.$id.handwritten: {$override['handwritten']} is not an IsamsRequest";
            }

            if ($operation !== null && ! isset($override['skip']) && ! isset($override['handwritten'])) {
                $area = explode(' - ', ApiSpec::cleanTag($operation['spec']['tags'][0] ?? 'Other'))[0];

                if (! in_array($area, $this->areas(), true)) {
                    $problems[] = "operations.$id: area $area is not generated; add it to areas or remove the override";
                }
            }
        }

        foreach (['models', 'properties'] as $key) {
            foreach (array_keys($this->overrides[$key] ?? []) as $definition) {
                if ($spec->definition($definition) === null) {
                    $problems[] = "$key.$definition: no such definition in the spec";
                }
            }
        }

        foreach (['areas' => $this->areas(), 'areaNouns' => array_keys($this->overrides['areaNouns'] ?? []), 'areaNames' => array_keys($this->overrides['areaNames'] ?? []), 'noiseWords' => array_keys($this->overrides['noiseWords'] ?? [])] as $key => $named) {
            foreach (array_diff($named, $areas) as $area) {
                $problems[] = "$key.$area: no such area in the spec";
            }
        }

        foreach (array_diff($this->ignoredTagSegments(), $spec->tagSegments()) as $segment) {
            $problems[] = "ignoredTagSegments.$segment: no tag in the spec has this segment";
        }

        foreach (array_diff(array_keys($this->overrides['modules'] ?? []), $spec->modules()) as $module) {
            $problems[] = "modules.$module: no such module in the spec's definitions";
        }

        if ($problems !== []) {
            throw new RuntimeException("generator/overrides.php names things the spec does not have:\n- ".implode("\n- ", $problems));
        }
    }

    /**
     * The areas to generate: the first part of a tag.
     *
     * @return list<string>
     */
    public function areas(): array
    {
        return $this->overrides['areas'] ?? [];
    }

    /**
     * An operation's settings, by its operationId ("v2:{operationId}" for one only in v2); overrides.php says what each
     * does.
     *
     * @return array{class?: string, method?: string, response?: string|array{definition: string}|array{list: string, key?: string, paged?: bool}, required?: list<string>, cacheable?: bool, safe?: bool, paginatable?: bool, multipart?: array<string, string>, handwritten?: class-string<IsamsRequest>, skip?: string}
     */
    public function operation(string $id): array
    {
        return $this->overrides['operations'][$id] ?? [];
    }

    /**
     * Every operation that has settings.
     *
     * @return array<string, array<string, mixed>>
     */
    public function operations(): array
    {
        return $this->overrides['operations'] ?? [];
    }

    /**
     * An area's PHP name, where its own words do not make one.
     */
    public function areaName(string $area): ?string
    {
        return $this->overrides['areaNames'][$area] ?? null;
    }

    /**
     * Leading words dropped from a tag's resource name in this area when choosing its namespace.
     *
     * @return list<string>
     */
    public function areaNouns(string $area): array
    {
        return $this->overrides['areaNouns'][$area] ?? [];
    }

    /**
     * Words iSAMS adds to this area's names without meaning, left out of namespaces and class names.
     *
     * @return list<string>
     */
    public function noiseWords(string $area): array
    {
        return $this->overrides['noiseWords'][$area] ?? [];
    }

    /**
     * Tag segments iSAMS uses as placeholders, left out of namespaces.
     *
     * @return list<string>
     */
    public function ignoredTagSegments(): array
    {
        return $this->overrides['ignoredTagSegments'] ?? [];
    }

    /**
     * Words that are the same singular and plural.
     *
     * @return list<string>
     */
    public function uncountable(): array
    {
        return $this->overrides['uncountable'] ?? [];
    }

    /**
     * The model namespace for an iSAMS module (the second segment of a definition name), where it differs from the
     * module's own name.
     */
    public function module(string $module): ?string
    {
        return $this->overrides['modules'][$module] ?? null;
    }

    /**
     * The class name (before its kind suffix) for a definition whose iSAMS name misleads.
     */
    public function modelName(string $definition): ?string
    {
        return $this->overrides['models'][$definition] ?? null;
    }

    /**
     * Enums whose generated name (module\name) reads badly: the better name.
     *
     * @return array<string, string>
     */
    public function enumNames(): array
    {
        return $this->overrides['enums'] ?? [];
    }

    /**
     * Fields iSAMS sends that its spec's definitions leave out.
     *
     * @return array<string, array<string, array<string, mixed>>> definition => property => schema
     */
    public function properties(): array
    {
        return $this->overrides['properties'] ?? [];
    }

    /**
     * Batch API methods whose call name is chosen by hand.
     *
     * @return array<string, string> method => call name
     */
    public function batchMethods(): array
    {
        return $this->overrides['batchMethods'] ?? [];
    }

    /**
     * Class names for Batch API records that several root nodes share, where the node's name would mislead.
     *
     * @return array<string, array<string, string>> module => node => class name
     */
    public function batchModels(): array
    {
        return $this->overrides['batchModels'] ?? [];
    }

    /**
     * Fails when the file holds a key or setting the generator does not read, a value of the wrong shape, or settings
     * nothing reads together, listing every problem at once.
     */
    private function rejectUnreadable(): void
    {
        $problems = [];

        foreach (array_keys(array_diff_key($this->overrides, self::KEYS)) as $key) {
            $problems[] = "$key: no such key";
        }

        foreach (array_intersect_key(self::KEYS, $this->overrides) as $key => $shape) {
            if (! $this->fits($this->overrides[$key], $shape)) {
                $problems[] = "$key: must be ".$this->describe($shape);
            }
        }

        foreach ($this->overrides['operations'] ?? [] as $id => $settings) {
            if (is_array($settings)) {
                $problems = [...$problems, ...$this->settingProblems((string) $id, $settings)];
            }
        }

        if ($problems !== []) {
            throw new RuntimeException("generator/overrides.php is not in the shape the generator reads:\n- ".implode("\n- ", $problems));
        }
    }

    /**
     * @param  array<string, mixed>  $settings
     * @return list<string>
     */
    private function settingProblems(string $id, array $settings): array
    {
        $problems = [];

        foreach (array_keys(array_diff_key($settings, self::SETTINGS)) as $setting) {
            $problems[] = "operations.$id.$setting: no such setting";
        }

        foreach (array_intersect_key(self::SETTINGS, $settings) as $setting => $shape) {
            if (! $this->fits($settings[$setting], $shape)) {
                $problems[] = "operations.$id.$setting: must be ".$this->describe($shape);
            }
        }

        if (isset($settings['skip']) && count($settings) > 1) {
            $problems[] = "operations.$id: a skipped operation has no other settings";
        } elseif (isset($settings['handwritten'])) {
            foreach (array_intersect(array_keys($settings), self::GENERATED_ONLY) as $setting) {
                $problems[] = "operations.$id.$setting: a hand-written request does not read it";
            }
        }

        return $problems;
    }

    private function fits(mixed $value, string $shape): bool
    {
        return match (true) {
            $shape === 'string' => is_string($value) && $value !== '',
            $shape === 'bool' => is_bool($value),
            $shape === 'array' => is_array($value),
            $shape === 'class name' => is_string($value) && preg_match('/^[A-Z]\w*Request$/', $value) === 1,
            $shape === 'method name' => is_string($value) && preg_match('/^[a-z]\w*$/', $value) === 1,
            $shape === 'response' => $this->isResponse($value),
            str_starts_with($shape, 'list<') => is_array($value) && array_is_list($value) && array_all($value, fn (mixed $item) => $this->fits($item, substr($shape, 5, -1))),
            str_starts_with($shape, 'map<') => is_array($value) && array_all(array_keys($value), fn (mixed $key) => is_string($key)) && array_all($value, fn (mixed $item) => $this->fits($item, substr($shape, 4, -1))),
            default => false,
        };
    }

    /**
     * A response correction: a shape name, one record of a definition, or a list of one under a key.
     */
    private function isResponse(mixed $value): bool
    {
        if (is_string($value)) {
            return in_array($value, $this->shapes(), true);
        }

        if (! is_array($value)) {
            return false;
        }

        if (array_keys($value) === ['definition']) {
            return is_string($value['definition']);
        }

        return isset($value['list']) && is_string($value['list'])
            && array_diff(array_keys($value), ['list', 'key', 'paged']) === []
            && is_string($value['key'] ?? '')
            && is_bool($value['paged'] ?? false);
    }

    private function describe(string $shape): string
    {
        return self::DESCRIPTIONS[$shape] ?? 'a response shape ('.implode(', ', $this->shapes()).'), [\'definition\' => …] or [\'list\' => …, \'key\' => …, \'paged\' => …]';
    }

    /**
     * The response shapes a request can have.
     *
     * @return list<string>
     */
    private function shapes(): array
    {
        return array_values(array_filter((new ReflectionClass(IsamsRequest::class))->getConstants(), is_string(...)));
    }
}
