<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Gradebooks\CalculationColumnWeightings;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Adds Weighting Elements to a Gradebook Calculation Column.
 *
 * POST /api/gradebooks/{gradebookId}/structure/calculationcolumns/{columnId}/weightingelements
 */
#[Beta]
class CreateCalculationColumnWeightingsRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  array<mixed>  $weightingElementIds
     */
    public function __construct(
        protected int $gradebookId,
        protected int $columnId,
        protected array $weightingElementIds,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks/'.rawurlencode((string) $this->gradebookId).'/structure/calculationcolumns/'.rawurlencode((string) $this->columnId).'/weightingelements';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->weightingElementIds;
    }
}
