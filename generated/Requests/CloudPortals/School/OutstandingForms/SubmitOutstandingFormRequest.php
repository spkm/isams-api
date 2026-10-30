<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\OutstandingForms;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Submit an in-progress Form Builder fill (Portals → Form Builder).
 *
 * POST /api/portals/outstandingforms/{formId}/fills/{fillId}/submit
 */
class SubmitOutstandingFormRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  array<mixed>  $bodyValue
     */
    public function __construct(
        protected string $formId,
        protected string $fillId,
        protected array $bodyValue,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/outstandingforms/'.rawurlencode((string) $this->formId).'/fills/'.rawurlencode((string) $this->fillId).'/submit';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->bodyValue;
    }
}
