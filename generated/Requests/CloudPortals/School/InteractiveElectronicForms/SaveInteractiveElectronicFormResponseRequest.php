<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\InteractiveElectronicForms;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\CloudPortals\ElectronicFormResponseForCreate;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * POST /api/portals/electronicforms/{formId}/responses
 */
class SaveInteractiveElectronicFormResponseRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\CloudPortals\ElectronicFormResponseForCreate|array<string, mixed>  $formResponse
     */
    public function __construct(
        protected int $formId,
        protected ElectronicFormResponseForCreate|array $formResponse,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/electronicforms/'.rawurlencode((string) $this->formId).'/responses';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->formResponse instanceof Data ? $this->formResponse->toArray() : $this->formResponse;
    }
}
