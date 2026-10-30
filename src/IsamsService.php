<?php

namespace spkm\IsamsApi;

use BadMethodCallException;
use InvalidArgumentException;
use spkm\IsamsApi\Support\CircuitBreaker;

class IsamsService
{
    protected IsamsConnector $connector;

    /** @var array<string, IsamsConnector> */
    protected array $connections = [];

    public function connection(string $name): IsamsConnector
    {
        $config = config("isams-api.connections.$name");

        if (! is_array($config)) {
            throw new InvalidArgumentException('No iSAMS connection named "'.$name.'" is configured in isams-api.connections.');
        }

        foreach (['client_id', 'client_secret', 'base_url'] as $setting) {
            if (! is_string($config[$setting] ?? null) || $config[$setting] === '') {
                throw new InvalidArgumentException('The iSAMS connection "'.$name.'" needs a '.$setting.'.');
            }
        }

        return $this->connections[$name] ??= new IsamsConnector($config['client_id'], $config['client_secret'], $config['base_url'], $config['scopes'] ?? ['restapi']);
    }

    public function isAvailable(?string $connection = null): bool
    {
        $baseUrl = config($connection === null ? 'isams-api.base_url' : "isams-api.connections.$connection.base_url");

        return ! CircuitBreaker::enabled() || ! is_string($baseUrl) || ! CircuitBreaker::for($baseUrl)->isOpen();
    }

    /**
     * @param  array<mixed>  $parameters
     */
    public function __call(string $method, array $parameters): mixed
    {
        $this->connector ??= new IsamsConnector(
            config('isams-api.client_id'),
            config('isams-api.client_secret'),
            config('isams-api.base_url')
        );

        if (method_exists($this->connector, $method)) {
            return $this->connector->{$method}(...$parameters);
        }

        throw new BadMethodCallException("Method {$method} does not exist.");
    }
}
