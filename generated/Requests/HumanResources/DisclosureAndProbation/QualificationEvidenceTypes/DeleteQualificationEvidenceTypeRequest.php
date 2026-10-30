<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\DisclosureAndProbation\QualificationEvidenceTypes;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Removes a qualification evidence type.
 *
 * DELETE /api/humanresources/disclosureandprobation/qualificationevidencetypes/{id}
 */
class DeleteQualificationEvidenceTypeRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/disclosureandprobation/qualificationevidencetypes/'.rawurlencode((string) $this->id);
    }
}
