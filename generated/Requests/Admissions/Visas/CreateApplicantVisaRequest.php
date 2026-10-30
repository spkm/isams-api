<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Admissions\Visas;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Admissions\ApplicantVisaForCreate;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a applicant Visa.
 *
 * POST /api/admissions/applicants/{schoolId}/visas
 */
#[Beta]
class CreateApplicantVisaRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\ApplicantVisaForCreate|array<string, mixed>  $visa
     */
    public function __construct(
        protected string $schoolId,
        protected ApplicantVisaForCreate|array $visa,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/admissions/applicants/'.rawurlencode((string) $this->schoolId).'/visas';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->visa instanceof Data ? $this->visa->toArray() : $this->visa;
    }
}
