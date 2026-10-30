<?php

namespace spkm\IsamsApi\Tests\Helpers;

use LogicException;
use ReflectionClass;
use Saloon\Enums\Method;
use Saloon\Http\OAuth2\GetClientCredentialsTokenRequest;
use Saloon\Http\PendingRequest;
use spkm\IsamsApi\Batch\IsamsBatchConnector;
use spkm\IsamsApi\IsamsBaseConnector;
use spkm\IsamsApi\IsamsConnector;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Connects the sandbox checks to your own iSAMS sandbox from ISAMS_SANDBOX_* environment variables, refusing anything
 * but reads unless ISAMS_SANDBOX_ALLOW_WRITES is true, and compares response shapes without showing any values.
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

    public static function connector(): IsamsConnector
    {
        $scopes = array_filter(explode(' ', self::env('ISAMS_SANDBOX_SCOPES') ?? 'restapi'));

        return self::guard(new IsamsConnector((string) self::env('ISAMS_SANDBOX_CLIENT_ID'), (string) self::env('ISAMS_SANDBOX_CLIENT_SECRET'), (string) self::env('ISAMS_SANDBOX_BASE_URL'), $scopes));
    }

    public static function batchConnector(): IsamsBatchConnector
    {
        return self::guard(new IsamsBatchConnector((string) self::env('ISAMS_SANDBOX_BATCH_KEY'), (string) self::env('ISAMS_SANDBOX_BATCH_SECRET'), (string) self::env('ISAMS_SANDBOX_BASE_URL')));
    }

    /**
     * Refuses every request that is not a read, unless ISAMS_SANDBOX_ALLOW_WRITES is true, and every GET that makes
     * iSAMS do something.
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

            if ($pendingRequest->getMethod() !== Method::GET && filter_var(self::env('ISAMS_SANDBOX_ALLOW_WRITES'), FILTER_VALIDATE_BOOLEAN) !== true) {
                throw new LogicException('The sandbox checks only read unless ISAMS_SANDBOX_ALLOW_WRITES is true; refused '.$pendingRequest->getMethod()->value.' '.class_basename($request).'.');
            }
        });

        return $connector;
    }

    /**
     * The differences between the field names iSAMS sent and a model's fields: names only, never values.
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
     * @param  array{unknown: list<string>, missing: list<string>}  $differences
     */
    public static function report(string $label, array $differences): void
    {
        if ($differences['unknown'] !== []) {
            fwrite(STDERR, "\n$label: iSAMS sent fields the model lacks: ".implode(', ', $differences['unknown']));
        }

        if ($differences['missing'] !== []) {
            fwrite(STDERR, "\n$label: model fields iSAMS did not send: ".implode(', ', $differences['missing']));
        }
    }

    private static function env(string $name): ?string
    {
        $value = getenv($name);

        return is_string($value) && $value !== '' ? $value : null;
    }
}
