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
 * Retrieves all entity types.
 *
 * GET /api/systemconfiguration/tags/entitytypes
 */
#[Beta]
class GetTagEntityTypesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = PrivateEntityType::class;
    public string $resultKey = 'entityTypes';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/systemconfiguration/tags/entitytypes';
    }
}
