<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Admissions\Alumni;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Admissions\Alumni;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves an alumnus/alumna.
 *
 * GET /api/admissions/applicants/alumni/{schoolId}
 */
class GetApplicantAlumnusRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = Alumni::class;

    public function __construct(
        protected string $schoolId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/admissions/applicants/alumni/'.rawurlencode((string) $this->schoolId);
    }
}
