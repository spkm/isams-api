<?php

namespace spkm\IsamsApi\Requests\BatchApi;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * @deprecated Use \spkm\IsamsApi\Batch\BatchRequest through Isams::batch(), which authenticates with the batch key itself as iSAMS requires from 2 November 2026.
 */
class GetEndpointRequest extends Request
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
        return match ($this->contentType) {
            'application/json' => '/api/batch/1.0/json.ashx?apiKey='.$this->batchKey,
            'application/xml' => '/api/batch/1.0/xml.ashx?apiKey='.$this->batchKey,
        };
    }
}
