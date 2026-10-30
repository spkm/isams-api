<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\InteractiveElectronicForms;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\CloudPortals\ElectronicForm;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/electronicforms/{formId}
 */
class GetInteractiveElectronicFormRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = ElectronicForm::class;

    public function __construct(
        protected int $formId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/electronicforms/'.rawurlencode((string) $this->formId);
    }
}
