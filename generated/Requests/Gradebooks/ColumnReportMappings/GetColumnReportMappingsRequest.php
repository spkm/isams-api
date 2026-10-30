<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Gradebooks\ColumnReportMappings;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Gradebooks\ReportMapping;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Gets Report Mappings for a Gradebook Column.
 *
 * GET /api/gradebooks/{gradebookId}/structure/columns/{columnId}/reportmappings
 */
#[Beta]
class GetColumnReportMappingsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = ReportMapping::class;

    public function __construct(
        protected int $gradebookId,
        protected int $columnId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks/'.rawurlencode((string) $this->gradebookId).'/structure/columns/'.rawurlencode((string) $this->columnId).'/reportmappings';
    }
}
