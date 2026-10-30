<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Admissions\Passports;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Admissions\ApplicantPassport;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves passport.
 *
 * GET /api/admissions/applicants/{schoolId}/passports/{id}
 */
#[Beta]
class GetApplicantPassportRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = ApplicantPassport::class;

    public function __construct(
        protected string $schoolId,
        protected int $id,
        protected ?string $expand = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/admissions/applicants/'.rawurlencode((string) $this->schoolId).'/passports/'.rawurlencode((string) $this->id);
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return array_filter([
            'expand' => $this->expand,
        ], fn (mixed $value) => $value !== null);
    }
}
