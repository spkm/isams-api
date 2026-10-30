<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\InteractiveElectronicForms;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\CloudPortals\ElectronicFormResponse;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/electronicforms/{formId}/responses/{formResponseDetailsId}
 */
class GetInteractiveElectronicFormResponsesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = ElectronicFormResponse::class;

    public function __construct(
        protected int $formId,
        protected int $formResponseDetailsId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/electronicforms/'.rawurlencode((string) $this->formId).'/responses/'.rawurlencode((string) $this->formResponseDetailsId);
    }
}
