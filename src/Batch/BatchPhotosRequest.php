<?php

namespace spkm\IsamsApi\Batch;

use Saloon\Enums\Method;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Downloads a zip of the current students' or staff members' photos, each named by the record's id.
 */
class BatchPhotosRequest extends IsamsRequest
{
    protected Method $method = Method::GET;

    public function __construct(protected string $feed) {}

    public static function students(): self
    {
        return new self('photos.ashx');
    }

    public static function staff(): self
    {
        return new self('staffphotos.ashx');
    }

    public function resolveEndpoint(): string
    {
        return '/api/batch/1.0/'.$this->feed;
    }

    /**
     * @return array<string, string>
     */
    protected function defaultHeaders(): array
    {
        return ['Accept' => '*/*'];
    }

    public function createDtoFromResponse(Response $response): BatchPhotos
    {
        if ($response->failed()) {
            throw new BatchApiException($response);
        }

        return new BatchPhotos($response->body());
    }
}
