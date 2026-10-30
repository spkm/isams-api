<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\News;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\News\NewsForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a news entry.
 *
 * POST /api/news
 */
#[Beta]
class CreateNewsRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\News\NewsForCreate|array<string, mixed>  $news
     */
    public function __construct(
        protected NewsForCreate|array $news,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/news';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->news instanceof Data ? $this->news->toArray() : $this->news;
    }
}
