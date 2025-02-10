<?php

namespace spkm\IsamsApi\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\PaginationPlugin\Contracts\Paginatable;

class BatchEndpointRequest extends Request
{
    protected Method $method = Method::GET;
    protected string $batchKey;
    protected string $contentType;

    public function __construct(string $batchKey, string $contentType = 'application/json')
    {
        $this->batchKey = $batchKey;
        $this->contentType = $contentType;
    }

    public function resolveEndpoint(): string
    {
        return match($this->contentType){
            'application/json' => '/api/batch/1.0/json.ashx?apiKey='.$this->batchKey,
            'application/xml' => '/api/batch/1.0/xml.ashx?apiKey='.$this->batchKey,
        };
    }
}
