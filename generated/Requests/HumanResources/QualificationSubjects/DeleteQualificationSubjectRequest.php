<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\QualificationSubjects;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Removes a qualification subject.
 *
 * DELETE /api/humanresources/qualificationsubjects/{id}
 */
class DeleteQualificationSubjectRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/qualificationsubjects/'.rawurlencode((string) $this->id);
    }
}
