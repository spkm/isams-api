<?php

namespace spkm\IsamsApi;

use BadMethodCallException;
use InvalidArgumentException;
use spkm\IsamsApi\Batch\IsamsBatchConnector;
use spkm\IsamsApi\Support\CircuitBreaker;

class IsamsService
{
    protected IsamsConnector $connector;

    /** @var array<string, IsamsConnector> */
    protected array $connections = [];

    /** @var array<string, IsamsBatchConnector> */
    protected array $batchConnectors = [];

    public function connection(string $name): IsamsConnector
    {
        $config = config("isams-api.connections.$name");

        if (! is_array($config)) {
            throw new InvalidArgumentException('No iSAMS connection named "'.$name.'" is configured in isams-api.connections.');
        }

        return $this->connections[$name] ??= $this->connect($config, 'The iSAMS connection "'.$name.'"');
    }

    /**
     * A connector for one of a school's Batch API keys: the default school's, or a named connection's.
     */
    public function batch(string $key = 'default', ?string $connection = null): IsamsBatchConnector
    {
        $prefix = $connection === null ? 'isams-api' : "isams-api.connections.$connection";
        $config = config("$prefix.batch_keys.$key");
        $baseUrl = config("$prefix.base_url");

        if (! is_array($config)) {
            throw new InvalidArgumentException('No iSAMS batch key named "'.$key.'" is configured in '.$prefix.'.batch_keys.');
        }

        foreach (['api_key', 'client_secret'] as $setting) {
            if (! is_string($config[$setting] ?? null) || $config[$setting] === '') {
                throw new InvalidArgumentException('The iSAMS batch key "'.$key.'" needs a '.$setting.'.');
            }
        }

        if (! is_string($baseUrl) || $baseUrl === '') {
            throw new InvalidArgumentException('The iSAMS batch key "'.$key.'" needs its school\'s base_url in '.$prefix.'.base_url.');
        }

        return $this->batchConnectors["$prefix.$key"] ??= new IsamsBatchConnector($config['api_key'], $config['client_secret'], $baseUrl);
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
        $this->connector ??= $this->connect((array) config('isams-api'), 'The default iSAMS connection');

        if (method_exists($this->connector, $method)) {
            return $this->connector->{$method}(...$parameters);
        }

        throw new BadMethodCallException("Method {$method} does not exist.");
    }

    /**
     * @param  array<string, mixed>  $config
     */
    private function connect(array $config, string $connection): IsamsConnector
    {
        foreach (['client_id', 'client_secret', 'base_url'] as $setting) {
            if (! is_string($config[$setting] ?? null) || $config[$setting] === '') {
                throw new InvalidArgumentException("$connection needs a $setting.");
            }
        }

        return new IsamsConnector($config['client_id'], $config['client_secret'], $config['base_url'], $config['scopes'] ?? ['restapi']);
    }
}
