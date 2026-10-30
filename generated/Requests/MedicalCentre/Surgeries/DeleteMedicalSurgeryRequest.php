<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\Surgeries;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Removes a surgery and all associated doctors.
 *
 * DELETE /api/medical/surgeries/{surgeryId}
 */
class DeleteMedicalSurgeryRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;

    public function __construct(
        protected int $surgeryId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/medical/surgeries/'.rawurlencode((string) $this->surgeryId);
    }
}
