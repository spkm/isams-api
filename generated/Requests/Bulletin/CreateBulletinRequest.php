<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Bulletin;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Bulletin\BulletinForCreate;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a bulletin.
 *
 * POST /api/bulletin
 */
#[Beta]
class CreateBulletinRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\Bulletin\BulletinForCreate|array<string, mixed>  $bulletin
     */
    public function __construct(
        protected BulletinForCreate|array $bulletin,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/bulletin';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->bulletin instanceof Data ? $this->bulletin->toArray() : $this->bulletin;
    }
}
