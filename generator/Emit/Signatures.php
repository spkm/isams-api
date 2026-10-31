<?php

namespace spkm\IsamsApi\Generator\Emit;

use Nette\PhpGenerator\Method;
use Nette\PhpGenerator\PhpNamespace;
use spkm\IsamsApi\Generator\Operations;

/**
 * The parameters a request takes, as a method signature.
 *
 * @phpstan-import-type Parameters from Operations
 */
final class Signatures
{
    /**
     * Adds a request's parameters to a method, promoted to properties for its constructor: path parameters, the body,
     * multipart parts, then query parameters with the required ones first.
     *
     * @param  Parameters  $parameters
     */
    public static function addParameters(Method $method, array $parameters, PhpNamespace $namespace, bool $promote): void
    {
        $add = fn (string $name) => $promote ? $method->addPromotedParameter($name)->setProtected() : $method->addParameter($name);

        foreach ($parameters['path'] as $parameter) {
            $add($parameter['php'])->setType($parameter['type']);
        }

        if ($parameters['body'] !== null) {
            $body = $parameters['body'];
            $type = match ($body['kind']) {
                'patch' => 'spkm\IsamsApi\Support\JsonPatch|array',
                'model' => $body['model'].'|array',
                'string' => 'string',
                default => 'array',
            };

            if ($body['kind'] === 'patch') {
                $namespace->addUse('spkm\IsamsApi\Support\JsonPatch');
            } elseif ($body['kind'] === 'model') {
                $namespace->addUse($body['model']);
            }

            $add($body['php'])->setType($type);
        }

        foreach ($parameters['multipart'] as $part) {
            $type = $part['file'] ? 'Saloon\Data\MultipartValue' : ($part['model'] ? $part['model'].'|array' : 'array');
            $namespace->addUse($part['file'] ? 'Saloon\Data\MultipartValue' : ($part['model'] ?? 'Saloon\Data\MultipartValue'));
            $parameter = $add($part['php'])->setType($part['required'] ? $type : ($part['file'] ? '?'.$type : $type.'|null'));

            if (! $part['required']) {
                $parameter->setDefaultValue(null);
            }
        }

        if ($parameters['body'] !== null && $parameters['body']['kind'] !== 'string') {
            $body = $parameters['body'];
            $method->addComment('@param  '.match ($body['kind']) {
                'patch' => '\\spkm\\IsamsApi\\Support\\JsonPatch|list<array<string, mixed>>',
                'model' => '\\'.$body['model'].'|array<string, mixed>',
                'models' => 'array<int, \\'.$body['model'].'|array<string, mixed>>',
                default => 'array<mixed>',
            }.'  $'.$body['php']);
        }

        foreach ($parameters['multipart'] as $part) {
            if (! $part['file']) {
                $method->addComment('@param  '.($part['model'] ? '\\'.$part['model'].'|' : '').'array<string, mixed>'.($part['required'] ? '' : '|null').'  $'.$part['php']);
            }
        }

        $query = $parameters['query'];
        uasort($query, fn (array $a, array $b) => $b['required'] <=> $a['required']);

        foreach ($query as $parameter) {
            $type = $parameter['required'] ? ltrim(str_replace('|null', '', $parameter['type']), '?') : $parameter['type'];
            $added = $add($parameter['php'])->setType($type);

            if (str_contains($type, 'array')) {
                $method->addComment('@param  array<mixed>'.($parameter['required'] ? '' : '|null').'  $'.$parameter['php']);
            }

            if (! $parameter['required']) {
                $added->setDefaultValue(null);
            }
        }
    }
}
