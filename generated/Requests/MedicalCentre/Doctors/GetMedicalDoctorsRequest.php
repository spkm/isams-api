<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\Doctors;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\Doctor;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a surgeries doctors.
 *
 * GET /api/medical/surgery/{surgeryId}/doctors
 */
class GetMedicalDoctorsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Doctor::class;
    public string $resultKey = 'doctors';
    protected bool $cacheable = true;

    public function __construct(
        protected int $surgeryId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/medical/surgery/'.rawurlencode((string) $this->surgeryId).'/doctors';
    }
}
