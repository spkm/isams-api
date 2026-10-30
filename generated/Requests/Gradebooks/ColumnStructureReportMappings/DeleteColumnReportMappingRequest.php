<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Gradebooks\ColumnStructureReportMappings;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Removes Report Mapping from a Gradebook Column.
 *
 * DELETE /api/gradebooks/{gradebookId}/structure/columns/{columnId}/reportmappings/{reportMappingId}
 */
#[Beta]
class DeleteColumnReportMappingRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;

    public function __construct(
        protected int $gradebookId,
        protected int $columnId,
        protected int $reportMappingId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks/'.rawurlencode((string) $this->gradebookId).'/structure/columns/'.rawurlencode((string) $this->columnId).'/reportmappings/'.rawurlencode((string) $this->reportMappingId);
    }
}
