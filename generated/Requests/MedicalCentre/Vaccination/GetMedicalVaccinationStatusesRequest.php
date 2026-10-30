<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\Vaccination;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\VaccinationStatus;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves Vaccination Statuses.
 *
 * GET /api/medical/vaccinationstatuses
 */
class GetMedicalVaccinationStatusesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = VaccinationStatus::class;
    public string $resultKey = 'vaccinationStatuses';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/medical/vaccinationstatuses';
    }
}
