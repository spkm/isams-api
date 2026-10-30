<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Requests\Gradebooks\ColumnReportMappings\CreateColumnReportMappingsRequest;
use spkm\IsamsApi\Requests\Gradebooks\ColumnReportMappings\DeleteColumnReportMappingRequest;
use spkm\IsamsApi\Requests\Gradebooks\ColumnReportMappings\GetColumnReportMappingsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class ColumnReportMappingsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Gradebooks\ReportMapping>
     * @see \spkm\IsamsApi\Requests\Gradebooks\ColumnReportMappings\GetColumnReportMappingsRequest
     */
    public function all(int $gradebookId, int $columnId): Collection
    {
        return $this->fetch(new GetColumnReportMappingsRequest(gradebookId: $gradebookId, columnId: $columnId));
    }

    /**
     * @param  array<int, \spkm\IsamsApi\Data\Gradebooks\ReportMappingForCreate|array<string, mixed>>  $reportMappings
     * @see \spkm\IsamsApi\Requests\Gradebooks\ColumnReportMappings\CreateColumnReportMappingsRequest
     */
    public function createMany(int $gradebookId, int $columnId, array $reportMappings): Created
    {
        return $this->fetch(new CreateColumnReportMappingsRequest(gradebookId: $gradebookId, columnId: $columnId, reportMappings: $reportMappings));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Gradebooks\ColumnReportMappings\DeleteColumnReportMappingRequest
     */
    public function delete(int $gradebookId, int $columnId, int $reportMappingId): bool
    {
        $this->fetch(new DeleteColumnReportMappingRequest(gradebookId: $gradebookId, columnId: $columnId, reportMappingId: $reportMappingId));

        return true;
    }
}
