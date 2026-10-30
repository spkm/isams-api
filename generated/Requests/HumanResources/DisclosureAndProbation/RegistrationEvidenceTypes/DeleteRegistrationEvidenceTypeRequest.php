<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\RegistrationEvidenceTypes;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Removes a registration evidence type.
 *
 * DELETE /api/humanresources/disclosureandprobation/registrationevidencetypes/{id}
 */
class DeleteRegistrationEvidenceTypeRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/disclosureandprobation/registrationevidencetypes/'.rawurlencode((string) $this->id);
    }
}
