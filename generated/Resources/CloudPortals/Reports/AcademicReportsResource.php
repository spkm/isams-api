<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\Reports;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Stringable;
use spkm\IsamsApi\Requests\CloudPortals\Reports\AcademicReports\GetAcademicReportSchoolAssessmentsRequest;
use spkm\IsamsApi\Requests\CloudPortals\Reports\AcademicReports\GetAcademicReportSchoolReportsRequest;

class AcademicReportsResource extends BaseResource
{
    public function getSchoolAssessments(
        string $schoolId,
        ?int $page = null,
        ?int $pageSize = null,
        string|Stringable|null $filter = null,
    ): Response {
        return $this->connector->send(new GetAcademicReportSchoolAssessmentsRequest($schoolId, $page, $pageSize, $filter));
    }

    public function getSchoolReports(
        string $schoolId,
        ?int $page = null,
        ?int $pageSize = null,
        string|Stringable|null $filter = null,
    ): Response {
        return $this->connector->send(new GetAcademicReportSchoolReportsRequest($schoolId, $page, $pageSize, $filter));
    }
}
