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
 * Retrieves all passports associated with a applicant.
 *
 * GET /api/admissions/applicants/{schoolId}/passports
 */
#[Beta]
class GetApplicantPassportsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = ApplicantPassport::class;
    public string $resultKey = 'passports';

    public function __construct(
        protected string $schoolId,
        protected ?string $expand = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/admissions/applicants/'.rawurlencode((string) $this->schoolId).'/passports';
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
