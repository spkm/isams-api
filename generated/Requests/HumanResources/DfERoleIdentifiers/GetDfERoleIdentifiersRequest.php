<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\DfERoleIdentifiers;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\HumanResources\RoleIdentifier;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all role identifiers.
 *
 * GET /api/humanresources/roleidentifiers
 */
class GetDfERoleIdentifiersRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = RoleIdentifier::class;
    public string $resultKey = 'roleIdentifiers';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/roleidentifiers';
    }
}
