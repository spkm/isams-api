<?php

namespace spkm\IsamsApi\Batch;

use JsonException;
use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Response;
use Saloon\Traits\Body\HasStringBody;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Runs the Batch API methods allocated to the connector's key: all of them, or those the filters name.
 */
class BatchRequest extends IsamsRequest implements HasBody
{
    use HasStringBody;

    protected Method $method = Method::GET;

    public function __construct(protected ?BatchFilters $filters = null)
    {
        $this->method = $filters === null ? Method::GET : Method::POST;
    }

    public function resolveEndpoint(): string
    {
        return '/api/batch/1.0/json.ashx';
    }

    /**
     * Always a read: a POST only carries the filters.
     */
    public function isSafe(): bool
    {
        return true;
    }

    /**
     * @return array<string, string>
     */
    protected function defaultHeaders(): array
    {
        return $this->filters === null ? [] : ['Content-Type' => 'application/xml'];
    }

    protected function defaultBody(): ?string
    {
        return $this->filters?->toXml();
    }

    public function createDtoFromResponse(Response $response): BatchResponse
    {
        if ($response->failed()) {
            throw new BatchApiException($response);
        }

        try {
            return BatchResponse::fromResponse($response);
        } catch (JsonException) {
            throw new BatchApiException($response);
        }
    }
}
