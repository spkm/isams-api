<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\OutstandingForms;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\CloudPortals\OutstandingFormInstance;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Start fill for a Form Builder form that has not been started yet.
 *
 * GET /api/portals/outstandingforms/{formId}/fill
 */
class StartOutstandingFormFillRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = OutstandingFormInstance::class;

    public function __construct(
        protected string $formId,
        protected ?string $studentId = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/outstandingforms/'.rawurlencode((string) $this->formId).'/fill';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return array_filter([
            'studentId' => $this->studentId,
        ], fn (mixed $value) => $value !== null);
    }
}
