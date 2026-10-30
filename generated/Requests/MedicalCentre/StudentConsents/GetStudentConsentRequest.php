<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\StudentConsents;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\Consent;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a medical consent for a student.
 *
 * GET /api/medical/students/{schoolId}/consents/{consentId}
 */
class GetStudentConsentRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = Consent::class;

    public function __construct(
        protected string $schoolId,
        protected string $consentId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/medical/students/'.rawurlencode((string) $this->schoolId).'/consents/'.rawurlencode((string) $this->consentId);
    }
}
