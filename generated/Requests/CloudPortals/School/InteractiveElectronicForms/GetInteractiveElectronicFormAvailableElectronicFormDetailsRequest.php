<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\InteractiveElectronicForms;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\CloudPortals\AvailableElectronicFormDetails;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/electronicforms
 */
class GetInteractiveElectronicFormAvailableElectronicFormDetailsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = AvailableElectronicFormDetails::class;
    public string $resultKey = 'availableElectronicForms';

    public function resolveEndpoint(): string
    {
        return '/api/portals/electronicforms';
    }
}
