<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\Reports;

use Illuminate\Support\LazyCollection;
use Stringable;
use spkm\IsamsApi\Data\Reports\Report;
use spkm\IsamsApi\Requests\CloudPortals\Reports\AcademicReports\GetAcademicReportSchoolAssessmentsRequest;
use spkm\IsamsApi\Requests\CloudPortals\Reports\AcademicReports\GetAcademicReportSchoolReportsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class AcademicReportsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\LazyCollection<int, \spkm\IsamsApi\Data\Reports\Report>
     * @see \spkm\IsamsApi\Requests\CloudPortals\Reports\AcademicReports\GetAcademicReportSchoolAssessmentsRequest
     */
    public function getSchoolAssessments(string $schoolId, string|Stringable|null $filter = null): LazyCollection
    {
        return $this->each(new GetAcademicReportSchoolAssessmentsRequest(schoolId: $schoolId, filter: $filter), Report::class);
    }

    /**
     * @return \Illuminate\Support\LazyCollection<int, \spkm\IsamsApi\Data\Reports\Report>
     * @see \spkm\IsamsApi\Requests\CloudPortals\Reports\AcademicReports\GetAcademicReportSchoolReportsRequest
     */
    public function getSchoolReports(string $schoolId, string|Stringable|null $filter = null): LazyCollection
    {
        return $this->each(new GetAcademicReportSchoolReportsRequest(schoolId: $schoolId, filter: $filter), Report::class);
    }
}
