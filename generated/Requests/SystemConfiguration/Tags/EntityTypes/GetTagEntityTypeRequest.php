<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\SystemConfiguration\Tags\EntityTypes;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\SystemConfiguration\PrivateEntityType;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves an entity type.
 *
 * GET /api/systemconfiguration/tags/entitytypes/{id}
 */
#[Beta]
class GetTagEntityTypeRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = PrivateEntityType::class;
    protected bool $cacheable = true;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/systemconfiguration/tags/entitytypes/'.rawurlencode((string) $this->id);
    }
}
