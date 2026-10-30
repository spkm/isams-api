<?php

namespace spkm\IsamsApi\Generator;

use Illuminate\Support\Str;
use Nette\PhpGenerator\Literal;
use Nette\PhpGenerator\PhpFile;
use Nette\PhpGenerator\PsrPrinter;
use RuntimeException;
use spkm\IsamsApi\Batch\BatchData;

/**
 * Builds a model for each Batch API node, per module and root node, from the facts in generator/batch/nodes.php.
 */
final class BatchGenerator
{
    private const MARKER = 'Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.';

    private const TYPES = [
        'Integer' => 'int',
        'float' => 'float',
        'Bit' => 'bool',
        'Boolean' => 'bool',
        'DateTime' => 'Carbon\CarbonImmutable',
        'Date' => 'Carbon\CarbonImmutable',
        'smalldatetime' => 'Carbon\CarbonImmutable',
    ];

    private const RESERVED = ['Class'];

    /** @var array{modules: array<string, array<string, array<string, mixed>>>, methodFilters: array<string, array{module: string, element: string, attributes: array<string, string>, required: bool}>, photos: array<string, string>} */
    private array $facts;

    /** @var array<string, string> */
    private array $files = [];

    /** @var array<string, string> */
    private array $names;

    /** @var array<string, array{accessor: string, calls: list<array<string, mixed>>}> */
    private array $groups;

    public function __construct(string $root)
    {
        $this->facts = require $root.'/generator/batch/nodes.php';
        $this->names = (require $root.'/generator/overrides.php')['batchMethods'] ?? [];
    }

    /**
     * @return array<string, string>
     */
    public function build(): array
    {
        $roots = [];
        $methods = [];

        foreach ($this->facts['modules'] as $module => $moduleRoots) {
            foreach ($moduleRoots as $root => $facts) {
                $namespace = 'spkm\IsamsApi\Data\Batch\\'.$module.'\\'.$root;
                $entity = $facts['entity'];
                $roots[$module][$root] = ['entity' => $entity, 'model' => isset($facts['nodes'][$entity]) ? $this->emitNode($namespace, $entity, $facts['nodes']) : null];

                foreach ($facts['methods'] as $method) {
                    $methods[$method] = [$module, $root];
                }
            }
        }

        ksort($methods);
        $this->emitMap($roots, $methods);
        $this->emitGroups();
        ksort($this->files);

        return $this->files;
    }

    /**
     * The Batch API part of ENDPOINTS.md: each group's calls with what they return, the root nodes no known method
     * fills, and the photo feeds.
     *
     * @return array{contents: list<string>, section: string}
     */
    public function endpoints(): array
    {
        $contents = [];
        $sections = [];

        foreach ($this->groups() as $group => ['accessor' => $accessor, 'calls' => $calls]) {
            $rows = array_map(fn (array $call) => '| `Isams::batch()->'.$accessor.'()->'.$call['name'].'('.implode(', ', array_map(fn (array $parameter) => $parameter['signature'], $call['parameters'])).')` | `LazyCollection<'.class_basename($call['model']).'>` |', $calls);
            sort($rows);
            $contents[] = "  - [$group](#batch-".strtolower($group).') ('.count($rows).')';
            $sections[] = "### Batch: $group\n\n| Call | Returns |\n|---|---|\n".implode("\n", $rows)."\n";
        }

        $unnamed = [];

        foreach ($this->facts['modules'] as $module => $roots) {
            foreach ($roots as $root => $facts) {
                if ($facts['methods'] === []) {
                    $unnamed[] = "| `Isams::batch()->send(new BatchRequest)->dto()->models('$module', '$root')` | `Collection<".$this->className($facts['entity']).'>` |';
                }
            }
        }

        $section = implode("\n", [
            '## Batch API',
            '',
            'Each call runs one Batch API method and returns its records as a lazy collection of models, taking the method\'s filters as named',
            'parameters; a failure throws a `BatchApiException`. Pass a key\'s name to `Isams::batch()` to use a key other than the',
            'default. To run several methods in one request, send a `BatchRequest` and read each method from the response; see',
            '[Batch API](README.md#batch-api).',
            '',
            '```php',
            '$students = Isams::batch()->pupil()->currentPupils(); // LazyCollection<Pupil>',
            '',
            '// Mother and father contacts, at their work and company locations, of students with system status 0 or 1',
            '// who live at home and enrol in 2026 or 2027',
            '$contacts = Isams::batch()->contactAdvanced()->contacts(',
            '    contactTypes: [\'Mother\', \'Father\'],',
            '    contactLocations: [\'Work\', \'Company\'],',
            '    studentHome: true,',
            '    systemStatusesToInclude: [0, 1],',
            '    enrolmentSchoolYearsToInclude: [2026, 2027],',
            '); // LazyCollection<Contact>',
            '',
            '// Several methods in one request, each filtered under the names iSAMS documents for its filter',
            '$batch = Isams::batch()->send(new BatchRequest(',
            '    BatchFilters::make()',
            '        ->methods(\'Pupil_GetCurrentPupils\', \'Pupil_GetPassports\', \'ContactAdvanced_GetContacts\')',
            '        ->filter(\'StudentManager\', \'Passports\', [\'SystemStatusesToInclude\' => [0, 1]])',
            '        ->filter(\'StudentManager\', \'Contacts\', [',
            '            \'ContactTypes\' => [\'Mother\', \'Father\'],',
            '            \'StudentHome\' => true,',
            '            \'SystemStatusesToInclude\' => [0, 1],',
            '        ])',
            '))->dto();',
            '',
            '$students = $batch->method(\'Pupil_GetCurrentPupils\');',
            '$passports = $batch->method(\'Pupil_GetPassports\');',
            '$contacts = $batch->method(\'ContactAdvanced_GetContacts\');',
            '```',
            '',
            implode("\n", $sections),
            '### Batch: root nodes no method names',
            '',
            'These arrive when a request runs everything allocated to the key.',
            '',
            '| Call | Returns |',
            '|---|---|',
            implode("\n", $unnamed),
            '',
            '### Batch: photos',
            '',
            '| Call | Returns |',
            '|---|---|',
            '| `Isams::batch()->staffPhotos()` | `BatchPhotos`: `photos()` yields each staff id and PNG |',
            '| `Isams::batch()->studentPhotos()` | `BatchPhotos`: `photos()` yields each student id and PNG |',
            '',
        ]);

        return [
            'contents' => [
                '- [Batch API](#batch-api) ('.array_sum(array_map(fn (array $group) => count($group['calls']), $this->groups())).' calls)',
                ...$contents,
                '  - [Root nodes no method names](#batch-root-nodes-no-method-names) ('.count($unnamed).')',
                '  - [Photos](#batch-photos) (2)',
            ],
            'section' => $section,
        ];
    }

    /**
     * A group class per method prefix (Calendar_GetEvents is in CalendarGroup), each with a call per method, and the
     * HasBatchGroups trait that reaches them from the batch connector.
     */
    private function emitGroups(): void
    {
        $traitFile = new PhpFile;
        $traitFile->addComment(self::MARKER);
        $traitNamespace = $traitFile->addNamespace('spkm\\IsamsApi\\Batch');
        $trait = $traitNamespace->addTrait('HasBatchGroups');

        foreach ($this->groups() as $group => ['accessor' => $accessor, 'calls' => $calls]) {
            $class = 'spkm\\IsamsApi\\Batch\\Groups\\'.$group.'Group';
            $file = new PhpFile;
            $file->addComment(self::MARKER);
            $namespace = $file->addNamespace('spkm\\IsamsApi\\Batch\\Groups');
            $namespace->addUse('Illuminate\\Support\\LazyCollection');
            $namespace->addUse('spkm\\IsamsApi\\Batch\\BatchGroup');
            $groupClass = $namespace->addClass($group.'Group')->setExtends('spkm\\IsamsApi\\Batch\\BatchGroup');
            $shortNames = array_count_values(array_map(fn (array $call) => class_basename($call['model']), $calls));

            foreach ($calls as $call) {
                $model = $shortNames[class_basename($call['model'])] === 1 ? class_basename($call['model']) : '\\'.$call['model'];

                if ($model === class_basename($call['model'])) {
                    $namespace->addUse($call['model']);
                }

                $method = $groupClass->addMethod($call['name'])->setPublic()->setReturnType('Illuminate\\Support\\LazyCollection');
                $attributes = [];

                foreach ($call['parameters'] as $parameter) {
                    if ($parameter['type'] === 'DateTimeInterface') {
                        $namespace->addUse('DateTimeInterface');
                    }

                    $added = $method->addParameter($parameter['name'])->setType($parameter['type']);

                    if (! $parameter['required']) {
                        $added->setNullable()->setDefaultValue(null);
                    }

                    if ($parameter['type'] === 'array') {
                        $method->addComment('@param  list<int|string>'.($parameter['required'] ? '' : '|null').'  $'.$parameter['name']);
                    }

                    $attributes[] = var_export($parameter['attribute'], true).' => $'.$parameter['name'];
                }

                $method->addComment("@return LazyCollection<int, $model>");
                $filter = $call['filter'] === null ? '' : ", ['module' => ".var_export($call['filter']['module'], true).", 'element' => ".var_export($call['filter']['element'], true).", 'attributes' => [".implode(', ', $attributes)."], 'required' => ".var_export($call['filter']['required'], true).']';
                $method->setBody('return $this->run('.var_export($call['method'], true).", $model::class$filter);");
            }

            $traitNamespace->addUse($class);
            $trait->addMethod($accessor)->setPublic()->setReturnType($class)->setBody("return new {$group}Group(\$this);");
            $this->files[$this->pathFor($class)] = (new PsrPrinter)->printFile($file);
        }

        $this->files['generated/Batch/HasBatchGroups.php'] = (new PsrPrinter)->printFile($traitFile);
    }

    /**
     * Each group's accessor and calls: the call's name, iSAMS method, model and filter, and a parameter per filter
     * attribute (required when the filter is and has at most two attributes, such as a date range).
     *
     * @return array<string, array{accessor: string, calls: list<array{name: string, method: string, model: string, filter: array{module: string, element: string, attributes: array<string, string>, required: bool}|null, parameters: list<array{name: string, attribute: string, type: string, required: bool, signature: string}>}>}>
     */
    private function groups(): array
    {
        if (isset($this->groups)) {
            return $this->groups;
        }

        $methods = [];

        foreach ($this->facts['modules'] as $module => $roots) {
            foreach ($roots as $root => $facts) {
                foreach ($facts['methods'] as $method) {
                    $methods[$method] = 'spkm\\IsamsApi\\Data\\Batch\\'.$module.'\\'.$root.'\\'.$this->className($facts['entity']);
                }
            }
        }

        foreach ([...array_keys($this->names), ...array_keys($this->facts['methodFilters'])] as $method) {
            if (! isset($methods[$method])) {
                throw new RuntimeException("$method: no such Batch API method in generator/batch/nodes.php");
            }
        }

        ksort($methods);
        $groups = [];

        foreach ($methods as $method => $model) {
            $group = (string) strstr($method, '_', true);
            $name = $this->callName($method, $group);
            $filter = $this->facts['methodFilters'][$method] ?? null;
            $required = $filter !== null && $filter['required'] && count($filter['attributes']) <= 2;
            $parameters = [];

            foreach ($filter['attributes'] ?? [] as $attribute => $type) {
                $phpType = match ($type) {
                    'Date', 'DateTime' => 'DateTimeInterface',
                    'Integer' => 'int',
                    'Boolean', 'Bit' => 'bool',
                    default => 'array',
                };
                $parameters[] = ['name' => $this->camel($attribute), 'attribute' => $attribute, 'type' => $phpType, 'required' => $required, 'signature' => ($required ? '' : '?').$phpType.' $'.$this->camel($attribute).($required ? '' : ' = null')];
            }

            if (isset($groups[$group]['calls'][$name])) {
                throw new RuntimeException("$method and {$groups[$group]['calls'][$name]['method']} would both be $group::$name(); name one in overrides.php batchMethods.");
            }

            $groups[$group]['accessor'] = $this->camel($group);
            $groups[$group]['calls'][$name] = ['name' => $name, 'method' => $method, 'model' => $model, 'filter' => $filter, 'parameters' => $parameters];
        }

        foreach ($groups as $group => $facts) {
            if (method_exists('spkm\\IsamsApi\\IsamsBaseConnector', $facts['accessor']) || in_array($facts['accessor'], ['studentPhotos', 'staffPhotos'], true)) {
                throw new RuntimeException("The $group group's accessor {$facts['accessor']}() would clash with a batch connector method.");
            }

            ksort($groups[$group]['calls']);
            $groups[$group]['calls'] = array_values($groups[$group]['calls']);
        }

        ksort($groups);

        return $this->groups = $groups;
    }

    /**
     * A call's name: the method without Get, a leading All, or the whole group name repeated at the start
     * (School_GetSchoolTerms is terms()); all() when nothing else is left (OtherSchools_GetOtherSchools).
     */
    private function callName(string $method, string $group): string
    {
        if (isset($this->names[$method])) {
            return $this->names[$method];
        }

        $action = (string) preg_replace(['/^Get(?=[A-Z])/', '/^All(?=[A-Z])/'], '', substr($method, strlen($group) + 1));

        if (rtrim($action, 's') === rtrim($group, 's')) {
            return 'all';
        }

        if (str_starts_with($action, $group) && ctype_upper($action[strlen($group)] ?? '')) {
            $action = substr($action, strlen($group));
        }

        return $this->camel($action);
    }

    /**
     * camelCase that lowercases a leading acronym whole: SENManager is senManager, IDsToInclude is idsToInclude.
     */
    private function camel(string $name): string
    {
        return match (true) {
            (bool) preg_match('/^([A-Z]{2,})s(?=[A-Z]|$)/', $name, $matches) => strtolower($matches[1]).substr($name, strlen($matches[1])),
            (bool) preg_match('/^([A-Z]+)(?=[A-Z][a-z])/', $name, $matches) => strtolower($matches[1]).substr($name, strlen($matches[1])),
            default => lcfirst($name),
        };
    }

    /**
     * @param  array<string, array{attributes: array<string, string>, children: array<string, string>}>  $nodes
     */
    private function emitNode(string $namespace, string $node, array $nodes): string
    {
        $class = $namespace.'\\'.$this->className($node);

        if (isset($this->files[$this->pathFor($class)])) {
            return $class;
        }

        $this->files[$this->pathFor($class)] = '';
        $file = new PhpFile;
        $file->addComment(self::MARKER);
        $phpNamespace = $file->addNamespace($namespace);
        $phpNamespace->addUse(BatchData::class);
        $model = $phpNamespace->addClass($this->className($node))->setExtends(BatchData::class)->setReadOnly();
        $constructor = $model->addMethod('__construct');
        $lists = [];
        $docs = [];
        $properties = [];

        foreach ([...$nodes[$node]['attributes'], ...$nodes[$node]['children']] as $name => $type) {
            $property = BatchData::propertyName($name);

            if (isset($properties[$property])) {
                continue;
            }

            $properties[$property] = true;
            $parameter = $constructor->addPromotedParameter($property)->setPublic();

            if (! str_starts_with($type, '<')) {
                $phpType = self::TYPES[$type] ?? 'string';
                $parameter->setType('?'.$phpType)->setDefaultValue(null);

                if (str_contains($phpType, '\\')) {
                    $phpNamespace->addUse($phpType);
                }

                continue;
            }

            $repeated = str_ends_with($type, '[]');
            $child = trim(substr($type, 0, $repeated ? -2 : null), '<>');
            $item = $repeated ? $child : $this->listItem($child, $nodes);

            if ($item !== null && isset($nodes[$item])) {
                $itemClass = $this->emitNode($namespace, $item, $nodes);
                $phpNamespace->addUse('Illuminate\Support\Collection');
                $phpNamespace->addUse($itemClass);
                $parameter->setType('Illuminate\Support\Collection')->setDefaultValue(new Literal('new Collection'));
                $lists[$property] = new Literal(class_basename($itemClass).'::class');
                $docs[] = '@param  Collection<int, '.class_basename($itemClass).'>  $'.$property;
            } elseif ($item === null && isset($nodes[$child]) && $child !== $node) {
                $childClass = $this->emitNode($namespace, $child, $nodes);
                $phpNamespace->addUse($childClass);
                $parameter->setType('?'.$childClass)->setDefaultValue(null);
            } else {
                $parameter->setType('?array')->setDefaultValue(null);
                $docs[] = '@param  array<mixed>|null  $'.$property;
            }
        }

        if ($lists !== []) {
            $model->addConstant('LISTS', $lists)->setProtected();
        }

        if ($docs !== []) {
            $constructor->addComment(implode("\n", $docs));
        }

        if ($constructor->getParameters() === []) {
            $model->removeMethod('__construct');
        }

        $this->files[$this->pathFor($class)] = (new PsrPrinter)->printFile($file);

        return $class;
    }

    /**
     * The item node of a container node (one that only holds a list of another node), or null for any other node.
     *
     * @param  array<string, array{attributes: array<string, string>, children: array<string, string>}>  $nodes
     */
    private function listItem(string $node, array $nodes): ?string
    {
        $definition = $nodes[$node] ?? null;

        if ($definition === null) {
            return Str::singular($node) !== $node ? Str::singular($node) : null;
        }

        $children = array_values($definition['children']);

        return $definition['attributes'] === [] && count($children) === 1 && str_starts_with($children[0], '<') ? trim($children[0], '<>') : null;
    }

    /**
     * @param  array<string, array<string, array{entity: string, model: ?string}>>  $roots
     * @param  array<string, array{string, string}>  $methods
     */
    private function emitMap(array $roots, array $methods): void
    {
        $file = new PhpFile;
        $file->addComment(self::MARKER);
        $class = $file->addNamespace('spkm\IsamsApi\Batch')->addClass('BatchMap')->setFinal();
        $class->addComment('Where each Batch API method\'s records sit in a response, and the model for each root node\'s records.');
        $class->addConstant('ROOTS', $roots)->addComment('@var array<string, array<string, array{entity: string, model: class-string<\spkm\IsamsApi\Batch\BatchData>|null}>>');
        $class->addConstant('METHODS', $methods)->addComment('@var array<string, array{string, string}>');

        $this->files['generated/Batch/BatchMap.php'] = (new PsrPrinter)->printFile($file);
    }

    private function className(string $node): string
    {
        return in_array($node, self::RESERVED, true) ? $node.'Node' : $node;
    }

    private function pathFor(string $class): string
    {
        return 'generated/'.str_replace('\\', '/', Str::after($class, 'spkm\IsamsApi\\')).'.php';
    }
}
