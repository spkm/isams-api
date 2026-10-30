<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Gradebooks\CalculationColumnStructure;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Gradebooks\CalculationColumnStructureForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Create a calculation column.
 *
 * POST /api/gradebooks/{gradebookId}/structure/calculationcolumns
 */
#[Beta]
class CreateCalculationColumnRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\Gradebooks\CalculationColumnStructureForCreate|array<string, mixed>  $calculationColumnStructure
     */
    public function __construct(
        protected int $gradebookId,
        protected CalculationColumnStructureForCreate|array $calculationColumnStructure,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks/'.rawurlencode((string) $this->gradebookId).'/structure/calculationcolumns';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->calculationColumnStructure instanceof Data ? $this->calculationColumnStructure->toArray() : $this->calculationColumnStructure;
    }
}
