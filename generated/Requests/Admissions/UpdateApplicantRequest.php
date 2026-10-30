<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Admissions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Admissions\ApplicantForUpdate;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Updates an applicant.
 *
 * PUT /api/admissions/applicants/{schoolId}
 */
class UpdateApplicantRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\ApplicantForUpdate|array<string, mixed>  $applicant
     */
    public function __construct(
        protected string $schoolId,
        protected ApplicantForUpdate|array $applicant,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/admissions/applicants/'.rawurlencode((string) $this->schoolId);
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->applicant instanceof Data ? $this->applicant->toArray() : $this->applicant;
    }
}
