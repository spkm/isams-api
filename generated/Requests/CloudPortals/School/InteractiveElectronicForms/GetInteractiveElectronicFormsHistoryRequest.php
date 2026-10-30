<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\InteractiveElectronicForms;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\CloudPortals\ElectronicFormDetails;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/electronicforms/history
 */
class GetInteractiveElectronicFormsHistoryRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = ElectronicFormDetails::class;
    public string $resultKey = 'electronicForms';

    public function resolveEndpoint(): string
    {
        return '/api/portals/electronicforms/history';
    }
}
