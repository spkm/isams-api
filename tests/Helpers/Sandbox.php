<?php

namespace spkm\IsamsApi\Tests\Helpers;

use LogicException;
use ReflectionClass;
use ReflectionParameter;
use Saloon\Enums\Method;
use Saloon\Http\OAuth2\GetClientCredentialsTokenRequest;
use Saloon\Http\PendingRequest;
use spkm\IsamsApi\Batch\BatchRequest;
use spkm\IsamsApi\Batch\IsamsBatchConnector;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\IsamsBaseConnector;
use spkm\IsamsApi\IsamsConnector;
use spkm\IsamsApi\Requests\IsamsRequest;
use Throwable;

/**
 * Connects the sandbox checks to your own iSAMS sandbox from ISAMS_SANDBOX_* environment variables, refusing anything
 * but reads unless ISAMS_SANDBOX_ALLOW_WRITES is true, and compares response shapes with the package's models.
 */
class Sandbox
{
    public static function configured(): bool
    {
        return self::env('ISAMS_SANDBOX_BASE_URL') !== null && self::env('ISAMS_SANDBOX_CLIENT_ID') !== null && self::env('ISAMS_SANDBOX_CLIENT_SECRET') !== null;
    }

    public static function batchConfigured(): bool
    {
        return self::env('ISAMS_SANDBOX_BASE_URL') !== null && self::env('ISAMS_SANDBOX_BATCH_KEY') !== null && self::env('ISAMS_SANDBOX_BATCH_SECRET') !== null;
    }

    /**
     * @param  list<string>|null  $scopes
     */
    public static function connector(?array $scopes = null): IsamsConnector
    {
        $scopes ??= array_values(array_filter(explode(' ', self::env('ISAMS_SANDBOX_SCOPES') ?? 'restapi')));

        return self::guard(new IsamsConnector((string) self::env('ISAMS_SANDBOX_CLIENT_ID'), (string) self::env('ISAMS_SANDBOX_CLIENT_SECRET'), (string) self::env('ISAMS_SANDBOX_BASE_URL'), $scopes));
    }

    public static function batchConnector(): IsamsBatchConnector
    {
        return self::guard(new IsamsBatchConnector((string) self::env('ISAMS_SANDBOX_BATCH_KEY'), (string) self::env('ISAMS_SANDBOX_BATCH_SECRET'), (string) self::env('ISAMS_SANDBOX_BASE_URL')));
    }

    /**
     * Refuses every request that is not a read, unless ISAMS_SANDBOX_ALLOW_WRITES is true, and every GET that makes
     * iSAMS do something. A Batch API request is always a read: its POST only carries the filters.
     *
     * @template TConnector of IsamsBaseConnector
     *
     * @param  TConnector  $connector
     * @return TConnector
     */
    public static function guard(IsamsBaseConnector $connector): IsamsBaseConnector
    {
        $connector->middleware()->onRequest(function (PendingRequest $pendingRequest): void {
            $request = $pendingRequest->getRequest();

            if ($request instanceof GetClientCredentialsTokenRequest) {
                return;
            }

            if ($request instanceof IsamsRequest && $pendingRequest->getMethod() === Method::GET && ! $request->isSafe()) {
                throw new LogicException('The sandbox checks never send '.class_basename($request).': it makes iSAMS do something.');
            }

            if ($pendingRequest->getMethod() !== Method::GET && ! $request instanceof BatchRequest && filter_var(self::env('ISAMS_SANDBOX_ALLOW_WRITES'), FILTER_VALIDATE_BOOLEAN) !== true) {
                throw new LogicException('The sandbox checks only read unless ISAMS_SANDBOX_ALLOW_WRITES is true; refused '.$pendingRequest->getMethod()->value.' '.class_basename($request).'.');
            }
        });

        return $connector;
    }

    /**
     * The differences between the field names iSAMS sent and a model's fields.
     *
     * @param  list<array<string, mixed>>  $records
     * @param  class-string  $model
     * @return array{unknown: list<string>, missing: list<string>}
     */
    public static function shapeDifferences(array $records, string $model): array
    {
        $fields = array_map(fn ($parameter) => $parameter->getName(), (new ReflectionClass($model))->getConstructor()?->getParameters() ?? []);
        $sent = array_values(array_unique(array_merge(...array_map(fn (array $record) => array_map('strval', array_keys($record)), $records ?: [[]]))));

        return [
            'unknown' => array_values(array_diff($sent, $fields)),
            'missing' => $records === [] ? [] : array_values(array_diff($fields, $sent)),
        ];
    }

    /**
     * How the records iSAMS sent differ from a model: fields the model lacks, model fields iSAMS never sent, and fields
     * whose values the model can't read (it would hold null instead). Nested models are compared too, named by their
     * path.
     *
     * @param  list<array<string, mixed>>  $records
     * @param  class-string<Data>  $model
     * @return array{unknown: list<string>, missing: list<string>, lost: list<string>}
     */
    public static function compare(array $records, string $model, string $path = ''): array
    {
        $class = new ReflectionClass($model);
        $parameters = $class->getConstructor()?->getParameters() ?? [];
        $names = array_map(fn (ReflectionParameter $parameter) => $parameter->getName(), $parameters);
        $lists = (array) $class->getConstant('LISTS');
        $differences = ['unknown' => [], 'missing' => [], 'lost' => []];
        $sent = [];

        foreach ($records as $record) {
            $sent = [...$sent, ...array_map('strval', array_keys($record))];

            try {
                $instance = $model::from($record);
            } catch (Throwable $exception) {
                $differences['lost'][] = $path.'(the whole record: '.class_basename($exception).')';

                continue;
            }

            foreach ($parameters as $parameter) {
                $name = $parameter->getName();
                $value = $record[$name] ?? null;
                $type = (string) $parameter->getType();

                if ($value === null || $value === [] || $value === '') {
                    continue;
                }

                if ($instance->{$name} === null) {
                    $differences['lost'][] = $path.$name.': iSAMS sends '.self::jsonType($value).', the model reads '.ltrim($type, '?');

                    continue;
                }

                $nested = $lists[$name] ?? (is_subclass_of(ltrim($type, '?'), Data::class) ? ltrim($type, '?') : null);

                if ($nested !== null && is_array($value)) {
                    $items = isset($lists[$name]) ? (array_is_list($value) ? $value : (count($value) === 1 && is_array(reset($value)) ? (array_is_list(reset($value)) ? reset($value) : [reset($value)]) : [$value])) : [$value];
                    $inner = self::compare(array_values(array_filter($items, 'is_array')), $nested, $path.$name.(isset($lists[$name]) ? '[].' : '.'));
                    $differences = array_merge_recursive($differences, $inner);
                }
            }
        }

        $differences['unknown'] = [...$differences['unknown'], ...array_map(fn (string $name) => $path.$name, array_diff(array_unique($sent), $names))];
        $differences['missing'] = [...$differences['missing'], ...($records === [] ? [] : array_map(fn (string $name) => $path.$name, array_diff($names, array_unique($sent))))];

        return array_map(fn (array $list) => array_values(array_unique($list)), $differences);
    }

    /**
     * The first record of a list response: a bare list, a paged envelope or a wrapper with one list.
     *
     * @return array<string, mixed>|null
     */
    public static function firstRecord(mixed $json): ?array
    {
        if (! is_array($json)) {
            return null;
        }

        if (array_is_list($json)) {
            return is_array($json[0] ?? null) ? $json[0] : null;
        }

        foreach ($json as $value) {
            if (is_array($value) && array_is_list($value)) {
                return is_array($value[0] ?? null) ? $value[0] : null;
            }
        }

        return null;
    }

    public static function jsonType(mixed $value): string
    {
        return match (true) {
            is_bool($value) => 'boolean',
            is_int($value) => 'integer',
            is_float($value) => 'number',
            is_string($value) => preg_match('/^\d{4}-\d{2}-\d{2}/', $value) ? 'date string' : (is_numeric($value) ? 'numeric string' : 'string'),
            is_array($value) && array_is_list($value) => 'list',
            is_array($value) => 'object',
            default => get_debug_type($value),
        };
    }

    /**
     * Writes a line of the sandbox report.
     */
    public static function line(string $text): void
    {
        fwrite(STDERR, "\n$text");
    }

    /**
     * @param  array{unknown: list<string>, missing: list<string>, lost?: list<string>}  $differences
     */
    public static function report(string $label, array $differences): void
    {
        if ($differences['unknown'] !== []) {
            fwrite(STDERR, "\n$label: iSAMS sent fields the model lacks: ".implode(', ', $differences['unknown']));
        }

        if ($differences['missing'] !== []) {
            fwrite(STDERR, "\n$label: model fields iSAMS did not send: ".implode(', ', $differences['missing']));
        }

        if (($differences['lost'] ?? []) !== []) {
            fwrite(STDERR, "\n$label: values the model can't read: ".implode('; ', $differences['lost']));
        }
    }

    private static function env(string $name): ?string
    {
        $value = getenv($name);

        return is_string($value) && $value !== '' ? $value : null;
    }
}
