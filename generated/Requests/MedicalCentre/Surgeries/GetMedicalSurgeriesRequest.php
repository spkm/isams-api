<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\Surgeries;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\Surgery;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all surgeries.
 *
 * GET /api/medical/surgeries
 */
class GetMedicalSurgeriesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Surgery::class;
    public string $resultKey = 'surgeries';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/medical/surgeries';
    }
}
