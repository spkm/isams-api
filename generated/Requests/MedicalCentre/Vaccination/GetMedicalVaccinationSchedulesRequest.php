<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\Vaccination;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\VaccinationSchedule;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves Vaccination Schedule.
 *
 * GET /api/medical/vaccinationschedules
 */
class GetMedicalVaccinationSchedulesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = VaccinationSchedule::class;
    public string $resultKey = 'vaccinationSchedules';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/medical/vaccinationschedules';
    }
}
