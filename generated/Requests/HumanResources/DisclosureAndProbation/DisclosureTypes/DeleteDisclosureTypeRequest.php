<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\DisclosureTypes;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Removes a disclosure type.
 *
 * DELETE /api/humanresources/disclosureandprobation/disclosuretypes/{id}
 */
class DeleteDisclosureTypeRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/disclosureandprobation/disclosuretypes/'.rawurlencode((string) $this->id);
    }
}
