<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\Surgeries;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\Surgery;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a surgery.
 *
 * GET /api/medical/surgeries/{surgeryId}
 */
class GetMedicalSurgeryRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = Surgery::class;
    protected bool $cacheable = true;

    public function __construct(
        protected int $surgeryId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/medical/surgeries/'.rawurlencode((string) $this->surgeryId);
    }
}
