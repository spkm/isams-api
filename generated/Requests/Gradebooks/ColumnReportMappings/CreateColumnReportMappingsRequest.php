<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Gradebooks\ColumnReportMappings;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Adds Report Mapping to a Gradebook Column.
 *
 * POST /api/gradebooks/{gradebookId}/structure/columns/{columnId}/reportmappings
 */
#[Beta]
class CreateColumnReportMappingsRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  array<int, \spkm\IsamsApi\Data\Gradebooks\ReportMappingForCreate|array<string, mixed>>  $reportMappings
     */
    public function __construct(
        protected int $gradebookId,
        protected int $columnId,
        protected array $reportMappings,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks/'.rawurlencode((string) $this->gradebookId).'/structure/columns/'.rawurlencode((string) $this->columnId).'/reportmappings';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return array_values(array_map(fn (mixed $item) => $item instanceof Data ? $item->toArray() : $item, $this->reportMappings));
    }
}
