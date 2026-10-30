<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\StudentConsents;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\MedicalCentre\ConsentForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a medical consent for a student.
 *
 * POST /api/medical/students/{schoolId}/consents
 */
class CreateStudentConsentRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\MedicalCentre\ConsentForCreate|array<string, mixed>  $consent
     */
    public function __construct(
        protected string $schoolId,
        protected ConsentForCreate|array $consent,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/medical/students/'.rawurlencode((string) $this->schoolId).'/consents';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->consent instanceof Data ? $this->consent->toArray() : $this->consent;
    }
}
