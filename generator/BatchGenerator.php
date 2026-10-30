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
