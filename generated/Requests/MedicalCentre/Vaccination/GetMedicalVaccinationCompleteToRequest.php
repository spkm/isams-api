<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\Vaccination;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\VaccinationCompleteTo;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves Vaccination Complete To.
 *
 * GET /api/medical/vaccinationcompleteto
 */
class GetMedicalVaccinationCompleteToRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = VaccinationCompleteTo::class;
    public string $resultKey = 'vaccinationCompleteTo';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/medical/vaccinationcompleteto';
    }
}
