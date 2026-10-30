<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Admissions\Passports;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Admissions\ApplicantPassportForCreate;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a applicant passport.
 *
 * POST /api/admissions/applicants/{schoolId}/passports
 */
#[Beta]
class CreateApplicantPassportRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\ApplicantPassportForCreate|array<string, mixed>  $applicantPassport
     */
    public function __construct(
        protected string $schoolId,
        protected ApplicantPassportForCreate|array $applicantPassport,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/admissions/applicants/'.rawurlencode((string) $this->schoolId).'/passports';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->applicantPassport instanceof Data ? $this->applicantPassport->toArray() : $this->applicantPassport;
    }
}
