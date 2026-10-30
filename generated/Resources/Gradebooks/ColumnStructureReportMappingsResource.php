<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Gradebooks\ColumnStructureReportMappings\CreateColumnReportMappingsRequest;
use spkm\IsamsApi\Requests\Gradebooks\ColumnStructureReportMappings\DeleteColumnReportMappingRequest;
use spkm\IsamsApi\Requests\Gradebooks\ColumnStructureReportMappings\GetColumnReportMappingsRequest;

class ColumnStructureReportMappingsResource extends BaseResource
{
    /**
     * @param  list<\spkm\IsamsApi\Data\Gradebooks\ReportMappingForCreate|array<string, mixed>>  $reportMappings
     */
    public function createColumnReportMappings(int $gradebookId, int $columnId, array $reportMappings): Response
    {
        return $this->connector->send(new CreateColumnReportMappingsRequest($gradebookId, $columnId, $reportMappings));
    }

    public function deleteColumnReportMapping(int $gradebookId, int $columnId, int $reportMappingId): Response
    {
        return $this->connector->send(new DeleteColumnReportMappingRequest($gradebookId, $columnId, $reportMappingId));
    }

    public function getColumnReportMappings(int $gradebookId, int $columnId): Response
    {
        return $this->connector->send(new GetColumnReportMappingsRequest($gradebookId, $columnId));
    }
}
