<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Admissions\Visas;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Admissions\ApplicantVisaForUpdate;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Updates a applicant Visa.
 *
 * PUT /api/admissions/applicants/{schoolId}/visas/{id}
 */
#[Beta]
class UpdateApplicantVisaRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\ApplicantVisaForUpdate|array<string, mixed>  $visa
     */
    public function __construct(
        protected string $schoolId,
        protected int $id,
        protected ApplicantVisaForUpdate|array $visa,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/admissions/applicants/'.rawurlencode((string) $this->schoolId).'/visas/'.rawurlencode((string) $this->id);
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->visa instanceof Data ? $this->visa->toArray() : $this->visa;
    }
}
