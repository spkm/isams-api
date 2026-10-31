<?php

namespace spkm\IsamsApi\Generator;

use Illuminate\Support\Str;
use Nette\PhpGenerator\Literal;
use Nette\PhpGenerator\PhpFile;
use Nette\PhpGenerator\PsrPrinter;
use RuntimeException;
use spkm\IsamsApi\Batch\BatchData;

/**
 * Builds a model for each Batch API node from the facts in generator/batch/nodes.php. A node whose records have the same
 * shape under several of a module's root nodes (the calendar's events this week, this month and so on) gets one model,
 * Data\Batch\{Module}\{Node}; any other node gets its root node's own, Data\Batch\{Module}\{RootNode}\{Node}, since the
 * same name can mean different records under different root nodes (PupilManager has eight kinds of Pupil).
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

    /** @var array<string, array<string, string>> module => node => class name, for nodes several root nodes share */
    private array $modelNames;

    /** @var array<string, array<string, array<string, string>>>|null module => root node => node => model class */
    private ?array $classes = null;

    public function __construct(string $root)
    {
        $this->facts = require $root.'/generator/batch/nodes.php';
        $overrides = require $root.'/generator/overrides.php';
        $this->names = $overrides['batchMethods'] ?? [];
        $this->modelNames = $overrides['batchModels'] ?? [];
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
                $entity = $facts['entity'];
                $roots[$module][$root] = ['entity' => $entity, 'model' => isset($facts['nodes'][$entity]) ? $this->emitNode($module, $root, $entity, $facts['nodes']) : null];

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
                    $unnamed[] = "| `Isams::batch()->send(new BatchRequest)->dto()->models('$module', '$root')` | `Collection<".class_basename($this->classes()[$module][$root][$facts['entity']] ?? $this->className($facts['entity'])).'>` |';
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
            $shortNames = array_count_values(array_map(fn (string $model) => class_basename($model), array_unique(array_column($calls, 'model'))));

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
                    $methods[$method] = $this->classes()[$module][$root][$facts['entity']] ?? 'spkm\\IsamsApi\\Data\\Batch\\'.$module.'\\'.$root.'\\'.$this->className($facts['entity']);
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
     * Writes a node's model, and the models of the nodes it holds, returning its class.
     *
     * @param  array<string, array{attributes: array<string, string>, children: array<string, string>}>  $nodes
     */
    private function emitNode(string $module, string $root, string $node, array $nodes): string
    {
        $class = $this->classes()[$module][$root][$node];

        if (isset($this->files[$this->pathFor($class)])) {
            return $class;
        }

        $this->files[$this->pathFor($class)] = '';
        $file = new PhpFile;
        $file->addComment(self::MARKER);
        $phpNamespace = $file->addNamespace(Str::beforeLast($class, '\\'));
        $phpNamespace->addUse(BatchData::class);
        $model = $phpNamespace->addClass(class_basename($class))->setExtends(BatchData::class)->setReadOnly();
        $constructor = $model->addMethod('__construct');
        $lists = [];
        $docs = [];

        foreach ($this->properties($node, $nodes) as $property) {
            $parameter = $constructor->addPromotedParameter($property['name'])->setPublic();

            switch ($property['kind']) {
                case 'scalar':
                    $parameter->setType('?'.$property['type'])->setDefaultValue(null);

                    if (str_contains($property['type'], '\\')) {
                        $phpNamespace->addUse($property['type']);
                    }

                    break;
                case 'list':
                    $itemClass = $this->emitNode($module, $root, $property['node'], $nodes);
                    $phpNamespace->addUse('Illuminate\Support\Collection');
                    $phpNamespace->addUse($itemClass);
                    $parameter->setType('Illuminate\Support\Collection')->setDefaultValue(new Literal('new Collection'));
                    $lists[$property['name']] = new Literal(class_basename($itemClass).'::class');
                    $docs[] = '@param  Collection<int, '.class_basename($itemClass).'>  $'.$property['name'];
                    break;
                case 'node':
                    $childClass = $this->emitNode($module, $root, $property['node'], $nodes);
                    $phpNamespace->addUse($childClass);
                    $parameter->setType('?'.$childClass)->setDefaultValue(null);
                    break;
                default:
                    $parameter->setType('?array')->setDefaultValue(null);
                    $docs[] = '@param  array<mixed>|null  $'.$property['name'];
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
     * What a node's model holds: a property per attribute and child (the first of any that share a property name), each
     * a scalar, a list of another node, another node, or a plain array.
     *
     * @param  array<string, array{attributes: array<string, string>, children: array<string, string>}>  $nodes
     * @return list<array{name: string, kind: 'scalar'|'list'|'node'|'array', type?: string, node?: string}>
     */
    private function properties(string $node, array $nodes): array
    {
        $properties = [];

        foreach ([...$nodes[$node]['attributes'], ...$nodes[$node]['children']] as $name => $type) {
            $property = BatchData::propertyName($name);

            if (isset($properties[$property])) {
                continue;
            }

            if (! str_starts_with($type, '<')) {
                $properties[$property] = ['name' => $property, 'kind' => 'scalar', 'type' => self::TYPES[$type] ?? 'string'];

                continue;
            }

            $repeated = str_ends_with($type, '[]');
            $child = trim(substr($type, 0, $repeated ? -2 : null), '<>');
            $item = $repeated ? $child : $this->listItem($child, $nodes);

            $properties[$property] = match (true) {
                $item !== null && isset($nodes[$item]) => ['name' => $property, 'kind' => 'list', 'node' => $item],
                $item === null && isset($nodes[$child]) && $child !== $node => ['name' => $property, 'kind' => 'node', 'node' => $child],
                default => ['name' => $property, 'kind' => 'array'],
            };
        }

        return array_values($properties);
    }

    /**
     * Each node's model class, per module and root node: shared by the root nodes whose records have the same shape (the
     * same node, holding the same properties and the same shapes of node), otherwise the root node's own.
     *
     * @return array<string, array<string, array<string, string>>> module => root node => node => model class
     */
    private function classes(): array
    {
        if ($this->classes !== null) {
            return $this->classes;
        }

        $classes = [];
        $shared = [];

        foreach ($this->facts['modules'] as $module => $roots) {
            $shapes = [];

            foreach ($roots as $root => $facts) {
                if (! isset($facts['nodes'][$facts['entity']])) {
                    continue;
                }

                foreach ($this->reachable($facts['entity'], $facts['nodes']) as $node) {
                    $shape = $node.'|'.$this->signature($node, $facts['nodes']);
                    $shapes[$shape]['node'] = $node;
                    $shapes[$shape]['roots'][] = $root;
                    $classes[$module][$root][$node] = $shape;
                }
            }

            $shared[$module] = [];

            foreach ($shapes as $shape => ['node' => $node, 'roots' => $shapeRoots]) {
                if (count($shapeRoots) > 1) {
                    $shared[$module][$shape] = 'spkm\\IsamsApi\\Data\\Batch\\'.$module.'\\'.($this->modelNames[$module][$node] ?? $this->className($node));
                }
            }

            foreach (array_count_values($shared[$module]) as $class => $count) {
                if ($count > 1) {
                    throw new RuntimeException("Records of different shapes, each under several of $module's root nodes, would all be $class; name them in overrides.php batchModels.");
                }
            }

            foreach ($classes[$module] ?? [] as $root => $nodes) {
                foreach ($nodes as $node => $shape) {
                    $classes[$module][$root][$node] = $shared[$module][$shape] ?? 'spkm\\IsamsApi\\Data\\Batch\\'.$module.'\\'.$root.'\\'.$this->className($node);
                }
            }
        }

        $problems = [];

        foreach ($this->modelNames as $module => $names) {
            foreach (array_keys($names) as $node) {
                $sharedNodes = array_map(fn (string $shape) => strstr($shape, '|', true), array_keys($shared[$module] ?? []));

                if (! in_array($node, $sharedNodes, true)) {
                    $problems[] = "batchModels.$module.$node: no $node records have the same shape under several of $module's root nodes";
                }
            }
        }

        if ($problems !== []) {
            throw new RuntimeException("generator/overrides.php names things the Batch API node lists do not have:\n- ".implode("\n- ", $problems));
        }

        return $this->classes = $classes;
    }

    /**
     * A node and every node it holds, directly or within those.
     *
     * @param  array<string, array{attributes: array<string, string>, children: array<string, string>}>  $nodes
     * @return list<string>
     */
    private function reachable(string $node, array $nodes): array
    {
        $found = [$node];

        for ($index = 0; $index < count($found); $index++) {
            foreach ($this->properties($found[$index], $nodes) as $property) {
                if (isset($property['node']) && ! in_array($property['node'], $found, true)) {
                    $found[] = $property['node'];
                }
            }
        }

        return $found;
    }

    /**
     * A node's shape: its name and properties, with each node it holds replaced by that node's own shape, so two nodes
     * match only when everything beneath them matches too.
     *
     * @param  array<string, array{attributes: array<string, string>, children: array<string, string>}>  $nodes
     * @param  list<string>  $within
     */
    private function signature(string $node, array $nodes, array $within = []): string
    {
        if (in_array($node, $within, true)) {
            return 'within:'.$node;
        }

        $properties = array_map(
            fn (array $property) => isset($property['node']) ? [...$property, 'node' => $this->signature($property['node'], $nodes, [...$within, $node])] : $property,
            $this->properties($node, $nodes),
        );

        return sha1($this->className($node).json_encode($properties));
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
