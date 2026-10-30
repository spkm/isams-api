<?php

namespace spkm\IsamsApi\Generator;

use Illuminate\Support\Str;
use Nette\PhpGenerator\Literal;
use Nette\PhpGenerator\PhpFile;
use Nette\PhpGenerator\PsrPrinter;
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

    /** @var array{modules: array<string, array<string, array<string, mixed>>>, photos: array<string, string>} */
    private array $facts;

    /** @var array<string, string> */
    private array $files = [];

    public function __construct(string $root)
    {
        $this->facts = require $root.'/generator/batch/nodes.php';
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
        ksort($this->files);

        return $this->files;
    }

    /**
     * The Batch API part of ENDPOINTS.md: each module's methods (and root nodes no known method fills) as you read
     * them from a response, with the model they return and the filters they take; then the photo feeds.
     *
     * @return array{contents: list<string>, section: string}
     */
    public function endpoints(): array
    {
        $contents = [];
        $sections = [];
        $total = 0;

        foreach ($this->facts['modules'] as $module => $roots) {
            $rows = [];

            foreach ($roots as $root => $facts) {
                $returns = '`Collection<'.$this->className($facts['entity']).'>`';
                $filters = $facts['filters'] === [] ? 'none' : implode(', ', array_map(fn (string $filter) => "`$filter`", array_keys($facts['filters']))).($facts['requiresFilters'] ? ' (required)' : '');
                $reads = $facts['methods'] === [] ? ["->models('$module', '$root')"] : array_map(fn (string $method) => "->method('$method')", $facts['methods']);

                foreach ($reads as $read) {
                    $rows[] = "| `$read` | $returns | $filters |";
                }
            }

            sort($rows);
            $total += count($rows);
            $contents[] = "  - [$module](#".strtolower($module).') ('.count($rows).')';
            $sections[] = "### $module\n\n| Read with | Returns | Filters |\n|---|---|---|\n".implode("\n", $rows)."\n";
        }

        $section = implode("\n", [
            '## Batch API',
            '',
            'The Batch API is one request per key rather than a call per endpoint: it runs every method allocated to the key, or',
            'the methods `BatchFilters::methods()` names, and you read each method\'s records from the response as models:',
            '',
            '```php',
            '$batch = Isams::batch()->send(new BatchRequest(',
            '    BatchFilters::make()',
            '        ->methods(\'Calendar_GetEvents\')',
            '        ->filter(\'Calendar\', \'Events\', [\'StartDate\' => now(), \'EndDate\' => now()->addMonth()])',
            '))->dto();',
            '',
            '$events = $batch->method(\'Calendar_GetEvents\'); // Collection<Event>',
            '```',
            '',
            'Root nodes no known method fills arrive when the key runs everything; read them with `models($module, $rootNode)`.',
            'Filters are set with `BatchFilters::filter()`, whose module and method names are the ones iSAMS documents for',
            'filters. Models are in `Data\\Batch\\{Module}\\{RootNode}`, and a failure throws a `BatchApiException`. See [Batch',
            'API](README.md#batch-api).',
            '',
            implode("\n", $sections),
            '### Photos',
            '',
            '| Call | Returns |',
            '|---|---|',
            '| `Isams::batch()->send(BatchPhotosRequest::staff())->dto()` | `BatchPhotos`: `photos()` yields each staff id and PNG |',
            '| `Isams::batch()->send(BatchPhotosRequest::students())->dto()` | `BatchPhotos`: `photos()` yields each student id and PNG |',
            '',
        ]);

        return [
            'contents' => ['- [Batch API](#batch-api) ('.$total.' methods and root nodes)', ...$contents, '  - [Photos](#photos) (2)'],
            'section' => $section,
        ];
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

            $child = trim($type, '<>');
            $item = $this->listItem($child, $nodes);

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
