<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Gradebooks\ColumnReportMappings\CreateColumnReportMappingsRequest;
use spkm\IsamsApi\Requests\Gradebooks\ColumnReportMappings\DeleteColumnReportMappingRequest;
use spkm\IsamsApi\Requests\Gradebooks\ColumnReportMappings\GetColumnReportMappingsRequest;

class ColumnReportMappingsResource extends BaseResource
{
    public function all(int $gradebookId, int $columnId): Response
    {
        return $this->connector->send(new GetColumnReportMappingsRequest($gradebookId, $columnId));
    }

    /**
     * @param  list<\spkm\IsamsApi\Data\Gradebooks\ReportMappingForCreate|array<string, mixed>>  $reportMappings
     */
    public function createMany(int $gradebookId, int $columnId, array $reportMappings): Response
    {
        return $this->connector->send(new CreateColumnReportMappingsRequest($gradebookId, $columnId, $reportMappings));
    }

    public function delete(int $gradebookId, int $columnId, int $reportMappingId): Response
    {
        return $this->connector->send(new DeleteColumnReportMappingRequest($gradebookId, $columnId, $reportMappingId));
    }
}
