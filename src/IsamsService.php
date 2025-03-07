<?php

namespace spkm\IsamsApi;

class IsamsService
{
    protected IsamsConnector $connector;

    public function __construct()
    {
        $this->connector = new IsamsConnector(
            config('isams-api.client_id'),
            config('isams-api.client_secret'),
            config('isams-api.base_url')
        );
    }

    public function __call($method, $parameters)
    {
        if (method_exists($this->connector, $method)) {
            return call_user_func_array([$this->connector, $method], $parameters);
        }

        throw new \BadMethodCallException("Method {$method} does not exist.");
    }
}
