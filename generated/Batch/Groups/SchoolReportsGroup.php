<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Batch\Groups;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchGroup;
use spkm\IsamsApi\Data\Batch\SchoolReports\ReportTypes\ReportType;
use spkm\IsamsApi\Data\Batch\SchoolReports\Templates\Template;

class SchoolReportsGroup extends BatchGroup
{
    /**
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\SchoolReports\ReportCycles\ReportCycle>
     */
    public function reportCycles(
        ?int $reportTerm = null,
        ?int $reportCycleType = null,
        ?int $reportYear = null,
    ): Collection {
        return $this->run('SchoolReports_GetReportCycles', \spkm\IsamsApi\Data\Batch\SchoolReports\ReportCycles\ReportCycle::class, ['module' => 'SchoolReports', 'element' => 'ReportCycles', 'attributes' => ['ReportTerm' => $reportTerm, 'ReportCycleType' => $reportCycleType, 'ReportYear' => $reportYear], 'required' => true]);
    }

    /**
     * @return Collection<int, ReportType>
     */
    public function reportTypes(): Collection
    {
        return $this->run('SchoolReports_GetReportTypes', ReportType::class);
    }

    /**
     * @param  list<int|string>|null  $reportCycleIdsToInclude
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\SchoolReports\ReportCycles\ReportCycle>
     */
    public function reports(
        ?array $reportCycleIdsToInclude = null,
        ?int $ncYear = null,
        ?int $reportType = null,
        ?int $reportStatus = null,
    ): Collection {
        return $this->run('SchoolReports_GetReports', \spkm\IsamsApi\Data\Batch\SchoolReports\ReportCycles\ReportCycle::class, ['module' => 'SchoolReports', 'element' => 'Reports', 'attributes' => ['reportCycleIdsToInclude' => $reportCycleIdsToInclude, 'ncYear' => $ncYear, 'reportType' => $reportType, 'reportStatus' => $reportStatus], 'required' => true]);
    }

    /**
     * @return Collection<int, Template>
     */
    public function templates(): Collection
    {
        return $this->run('SchoolReports_GetTemplates', Template::class);
    }
}
