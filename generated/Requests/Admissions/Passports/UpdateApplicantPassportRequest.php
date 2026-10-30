<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Admissions\Passports;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Admissions\ApplicantPassportForUpdate;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Updates applicant passport.
 *
 * PUT /api/admissions/applicants/{schoolId}/passports/{id}
 */
#[Beta]
class UpdateApplicantPassportRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\ApplicantPassportForUpdate|array<string, mixed>  $passport
     */
    public function __construct(
        protected string $schoolId,
        protected int $id,
        protected ApplicantPassportForUpdate|array $passport,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/admissions/applicants/'.rawurlencode((string) $this->schoolId).'/passports/'.rawurlencode((string) $this->id);
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->passport instanceof Data ? $this->passport->toArray() : $this->passport;
    }
}
