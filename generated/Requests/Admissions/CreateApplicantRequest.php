<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Admissions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Admissions\ApplicantForCreate;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates an applicant.
 *
 * POST /api/admissions/applicants
 */
class CreateApplicantRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\ApplicantForCreate|array<string, mixed>  $applicant
     */
    public function __construct(
        protected ApplicantForCreate|array $applicant,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/admissions/applicants';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->applicant instanceof Data ? $this->applicant->toArray() : $this->applicant;
    }
}
