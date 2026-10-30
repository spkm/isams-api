<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Bulletin\Divisions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Bulletin\BulletinDivisionsForCreate;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Update a bulletin's associated divisions
 *
 * POST /api/bulletin/{bulletinId}/divisions
 */
#[Beta]
class CreateBulletinDivisionsRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\Bulletin\BulletinDivisionsForCreate|array<string, mixed>  $bulletinDivisions
     */
    public function __construct(
        protected int $bulletinId,
        protected BulletinDivisionsForCreate|array $bulletinDivisions,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/bulletin/'.rawurlencode((string) $this->bulletinId).'/divisions';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->bulletinDivisions instanceof Data ? $this->bulletinDivisions->toArray() : $this->bulletinDivisions;
    }
}
