<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\OutstandingForms;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\CloudPortals\OutstandingFormInstance;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Continue fill for an in-progress Form Builder form instance.
 *
 * GET /api/portals/outstandingforms/{formId}/instances/{instanceId}
 */
class ContinueOutstandingFormFillRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = OutstandingFormInstance::class;

    public function __construct(
        protected string $formId,
        protected string $instanceId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/outstandingforms/'.rawurlencode((string) $this->formId).'/instances/'.rawurlencode((string) $this->instanceId);
    }
}
