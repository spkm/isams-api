<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\StudentConsents;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\Consent;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a student's medical consents.
 *
 * GET /api/medical/students/{schoolId}/consents
 */
class GetStudentConsentsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Consent::class;
    public string $resultKey = 'consents';

    public function __construct(
        protected string $schoolId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/medical/students/'.rawurlencode((string) $this->schoolId).'/consents';
    }
}
