<?php

namespace spkm\IsamsApi\Generator\Emit;

use Nette\PhpGenerator\ClassType;
use Nette\PhpGenerator\Literal;
use Nette\PhpGenerator\PhpNamespace;
use spkm\IsamsApi\Generator\Operations;

/**
 * Writes a generated operation's request class: its endpoint, query, body and the flags its response and overrides
 * call for.
 *
 * @phpstan-import-type GeneratedOperation from Operations
 */
final class RequestEmitter
{
    public function __construct(private readonly PhpFiles $files) {}

    /**
     * @param  GeneratedOperation  $operation
     */
    public function emit(array $operation): void
    {
        [$namespace, $file] = $this->files->start($operation['namespace']);
        $namespace->addUse('spkm\IsamsApi\Requests\IsamsRequest');
        $class = $namespace->addClass(class_basename($operation['class']))->setExtends('spkm\IsamsApi\Requests\IsamsRequest');
        $spec = $operation['spec'];
        $parameters = $operation['parameters'];
        $response = $operation['response'];

        $class->addComment(trim(($spec['summary'] ?? '')."\n\n".strtoupper($operation['method']).' '.$operation['path']));

        if ($operation['beta']) {
            $namespace->addUse('spkm\IsamsApi\Attributes\Beta');
            $class->addAttribute('spkm\IsamsApi\Attributes\Beta');
        }

        $namespace->addUse('Saloon\Enums\Method');
        $class->addProperty('method', new Literal('Method::'.strtoupper($operation['method'])))->setProtected()->setType('Saloon\Enums\Method');
        $class->addProperty('responseShape', new Literal('self::'.strtoupper($response['shape'])))->setProtected()->setType('string');

        if ($response['model'] !== null) {
            $namespace->addUse($response['model']);
            $class->addProperty('dto', new Literal(class_basename($response['model']).'::class'))->setProtected()->setType('?string');
        }

        if ($response['resultKey'] !== '') {
            $class->addProperty('resultKey', $response['resultKey'])->setPublic()->setType('string');
        }

        if ($operation['paginatable']) {
            $namespace->addUse('Saloon\PaginationPlugin\Contracts\Paginatable');
            $class->addImplement('Saloon\PaginationPlugin\Contracts\Paginatable');
        }

        if ($operation['cacheable']) {
            $class->addProperty('cacheable', true)->setProtected()->setType('bool');
        }

        if (! $operation['safe']) {
            $class->addProperty('safe', false)->setProtected()->setType('bool');
        }

        if ($operation['apiVersion']) {
            $class->addProperty('apiVersion', $operation['apiVersion'])->setProtected()->setType('?string');
        }

        $constructor = $class->addMethod('__construct');
        Signatures::addParameters($constructor, $parameters, $namespace, true);

        if ($constructor->getParameters() === []) {
            $class->removeMethod('__construct');
        }

        $endpoint = "'".preg_replace_callback('/\{(\w+)\}/', fn (array $match) => "'.rawurlencode((string) \$this->".$parameters['path'][$match[1]]['php'].").'", $operation['path'])."'";
        $class->addMethod('resolveEndpoint')->setReturnType('string')->setBody('return '.str_replace(".''", '', $endpoint).';');

        if ($parameters['query'] !== []) {
            $this->addQuery($class, $parameters['query']);
        }

        if ($parameters['body'] !== null) {
            $this->addBody($class, $namespace, $parameters['body']);
        } elseif ($parameters['multipart'] !== []) {
            $this->addMultipart($class, $namespace, $parameters['multipart']);
        }

        $this->files->add($operation['class'], $file);
    }

    /**
     * @param  array<string, array<string, mixed>>  $query
     */
    private function addQuery(ClassType $class, array $query): void
    {
        $lines = [];
        $anyOptional = false;

        foreach ($query as $name => $parameter) {
            $value = '$this->'.$parameter['php'];
            $orNull = $parameter['required'] ? '' : "$value === null ? null : ";
            $anyOptional = $anyOptional || ! $parameter['required'];
            $lines[] = '    '.var_export($name, true).' => '.match (true) {
                str_contains($parameter['type'], 'bool') => $orNull."($value ? 'true' : 'false')",
                str_contains($parameter['type'], 'Stringable') => $orNull."(string) $value",
                str_contains($parameter['type'], 'DateTimeInterface') => "$value instanceof \\DateTimeInterface ? {$value}->format('Y-m-d\\TH:i:s') : $value",
                default => $value,
            }.',';
        }

        $array = "[\n".implode("\n", $lines)."\n]";
        $class->addMethod('defaultQuery')->setProtected()->setReturnType('array')
            ->addComment('@return array<string, mixed>')
            ->setBody($anyOptional ? "return array_filter($array, fn (mixed \$value) => \$value !== null);" : "return $array;");
    }

    /**
     * @param  array<string, mixed>  $body
     */
    private function addBody(ClassType $class, PhpNamespace $namespace, array $body): void
    {
        $namespace->addUse('Saloon\Contracts\Body\HasBody');
        $class->addImplement('Saloon\Contracts\Body\HasBody');
        $value = '$this->'.$body['php'];

        if ($body['kind'] === 'string') {
            $namespace->addUse('Saloon\Traits\Body\HasStringBody');
            $class->addTrait('Saloon\Traits\Body\HasStringBody');
            $class->addMethod('defaultHeaders')->setProtected()->setReturnType('array')->addComment('@return array<string, string>')
                ->setBody("return ['Content-Type' => 'application/json'];");
            $class->addMethod('defaultBody')->setProtected()->setReturnType('string')->setBody("return (string) json_encode($value);");

            return;
        }

        $namespace->addUse('Saloon\Traits\Body\HasJsonBody');
        $class->addTrait('Saloon\Traits\Body\HasJsonBody');
        $namespace->addUse('spkm\IsamsApi\Data\Data');

        $code = match (true) {
            $body['kind'] === 'patch' => "return $value instanceof JsonPatch ? {$value}->toArray() : $value;",
            $body['kind'] === 'model' => "return $value instanceof Data ? {$value}->toArray() : $value;",
            $body['kind'] === 'models' => "return array_values(array_map(fn (mixed \$item) => \$item instanceof Data ? \$item->toArray() : \$item, $value));",
            $body['list'] => "return array_values($value);",
            default => "return $value;",
        };

        $class->addMethod('defaultBody')->setProtected()->setReturnType('array')->addComment('@return array<mixed>')->setBody($code);
    }

    /**
     * @param  array<string, array<string, mixed>>  $parts
     */
    private function addMultipart(ClassType $class, PhpNamespace $namespace, array $parts): void
    {
        $namespace->addUse('Saloon\Contracts\Body\HasBody');
        $namespace->addUse('Saloon\Traits\Body\HasMultipartBody');
        $namespace->addUse('Saloon\Data\MultipartValue');
        $namespace->addUse('spkm\IsamsApi\Data\Data');
        $class->addImplement('Saloon\Contracts\Body\HasBody');
        $class->addTrait('Saloon\Traits\Body\HasMultipartBody');

        $required = [];
        $optional = [];

        foreach ($parts as $name => $part) {
            $value = '$this->'.$part['php'];
            $code = $part['file']
                ? "new MultipartValue('$name', {$value}->value, {$value}->filename, {$value}->headers)"
                : "new MultipartValue('$name', (string) json_encode($value instanceof Data ? {$value}->toArray() : $value))";

            if ($part['required']) {
                $required[] = $code;
            } else {
                $optional[] = "if ($value !== null) {\n    \$parts[] = $code;\n}\n";
            }
        }

        $class->addMethod('defaultBody')->setProtected()->setReturnType('array')->addComment('@return list<MultipartValue>')
            ->setBody($optional === []
                ? 'return ['.implode(', ', $required).'];'
                : '$parts = ['.implode(', ', $required)."];\n\n".implode("\n", $optional)."\nreturn \$parts;");
    }
}
