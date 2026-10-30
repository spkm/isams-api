<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\StudentConsents;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Archives a medical consent for a student.
 *
 * POST /api/medical/students/{schoolId}/consents/{consentId}/commands/archive
 */
class ArchiveStudentConsentRequest extends IsamsRequest
{
    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    public function __construct(
        protected string $schoolId,
        protected string $consentId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/medical/students/'.rawurlencode((string) $this->schoolId).'/consents/'.rawurlencode((string) $this->consentId).'/commands/archive';
    }
}
