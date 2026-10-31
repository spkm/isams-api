<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Batch\Groups;

use Illuminate\Support\LazyCollection;
use spkm\IsamsApi\Batch\BatchGroup;
use spkm\IsamsApi\Data\Batch\SchoolReports\ReportCycles\ReportCycle;
use spkm\IsamsApi\Data\Batch\SchoolReports\ReportTypes\ReportType;
use spkm\IsamsApi\Data\Batch\SchoolReports\Templates\Template;

class SchoolReportsGroup extends BatchGroup
{
    /**
     * @return LazyCollection<int, ReportCycle>
     */
    public function reportCycles(
        ?int $reportTerm = null,
        ?int $reportCycleType = null,
        ?int $reportYear = null,
    ): LazyCollection {
        return $this->run('SchoolReports_GetReportCycles', ReportCycle::class, ['module' => 'SchoolReports', 'element' => 'ReportCycles', 'attributes' => ['ReportTerm' => $reportTerm, 'ReportCycleType' => $reportCycleType, 'ReportYear' => $reportYear], 'required' => true]);
    }

    /**
     * @return LazyCollection<int, ReportType>
     */
    public function reportTypes(): LazyCollection
    {
        return $this->run('SchoolReports_GetReportTypes', ReportType::class);
    }

    /**
     * @param  list<int|string>|null  $reportCycleIdsToInclude
     * @return LazyCollection<int, ReportCycle>
     */
    public function reports(
        ?array $reportCycleIdsToInclude = null,
        ?int $ncYear = null,
        ?int $reportType = null,
        ?int $reportStatus = null,
    ): LazyCollection {
        return $this->run('SchoolReports_GetReports', ReportCycle::class, ['module' => 'SchoolReports', 'element' => 'Reports', 'attributes' => ['reportCycleIdsToInclude' => $reportCycleIdsToInclude, 'ncYear' => $ncYear, 'reportType' => $reportType, 'reportStatus' => $reportStatus], 'required' => true]);
    }

    /**
     * @return LazyCollection<int, Template>
     */
    public function templates(): LazyCollection
    {
        return $this->run('SchoolReports_GetTemplates', Template::class);
    }
}
