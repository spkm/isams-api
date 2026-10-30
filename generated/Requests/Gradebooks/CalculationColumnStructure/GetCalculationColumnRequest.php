<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Gradebooks\CalculationColumnStructure;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Gradebooks\CalculationColumnStructure;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieve a calculation column.
 *
 * GET /api/gradebooks/{gradebookId}/structure/calculationcolumns/{columnId}
 */
#[Beta]
class GetCalculationColumnRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = CalculationColumnStructure::class;

    public function __construct(
        protected int $gradebookId,
        protected int $columnId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks/'.rawurlencode((string) $this->gradebookId).'/structure/calculationcolumns/'.rawurlencode((string) $this->columnId);
    }
}
