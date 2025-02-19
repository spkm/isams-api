<?php

namespace spkm\IsamsApi\Requests\Batch;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasXmlBody;

class FilterEndpointRequest extends Request implements HasBody
{
    use HasXmlBody;

    protected Method $method = Method::POST;

    protected string $batchKey;

    protected string $contentType;

    protected string $xmlFilters;

    public function __construct(string $batchKey, string $contentType = 'application/json', $xmlFilters = '')
    {
        $this->batchKey = $batchKey;
        $this->contentType = $contentType;
        $this->xmlFilters = $xmlFilters;

    }

    public function resolveEndpoint(): string
    {
        return match ($this->contentType) {
            'application/json' => '/api/batch/1.0/json.ashx?apiKey='.$this->batchKey,
            'application/xml' => '/api/batch/1.0/xml.ashx?apiKey='.$this->batchKey,
        };
    }

    public function defaultBody(): string
    {
        return $this->xmlFilters;

    }
}
