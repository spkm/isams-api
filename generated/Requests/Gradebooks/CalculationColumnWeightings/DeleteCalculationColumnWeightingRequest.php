<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Gradebooks\CalculationColumnWeightings;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Removes a Weighting from a Gradebook Calculation Column
 *
 * DELETE /api/gradebooks/{gradebookId}/structure/calculationcolumns/{columnId}/weightingelements/{weightingId}
 */
#[Beta]
class DeleteCalculationColumnWeightingRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;

    public function __construct(
        protected int $gradebookId,
        protected int $columnId,
        protected int $weightingId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks/'.rawurlencode((string) $this->gradebookId).'/structure/calculationcolumns/'.rawurlencode((string) $this->columnId).'/weightingelements/'.rawurlencode((string) $this->weightingId);
    }
}
