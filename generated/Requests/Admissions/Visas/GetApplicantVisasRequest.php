<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Admissions\Visas;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Admissions\ApplicantVisa;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all Visas associated with a applicant.
 *
 * GET /api/admissions/applicants/{schoolId}/visas
 */
#[Beta]
class GetApplicantVisasRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = ApplicantVisa::class;
    public string $resultKey = 'visas';

    public function __construct(
        protected string $schoolId,
        protected ?string $expand = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/admissions/applicants/'.rawurlencode((string) $this->schoolId).'/visas';
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
