<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\School\AttendanceRecords\GetAttendanceRecordAttendanceLessonRegistrationRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\AttendanceRecords\GetAttendanceRecordAttendanceOffGamesRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\AttendanceRecords\GetAttendanceRecordAttendanceOutOfClassRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\AttendanceRecords\GetAttendanceRecordAttendanceOutOfSchoolRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\AttendanceRecords\GetAttendanceRecordAttendanceRegistrationRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\AttendanceRecords\GetAttendanceRecordAttendanceRegistrationSummaryRequest;

class AttendanceRecordsResource extends BaseResource
{
    public function getLessonRegistration(string $schoolId, int $termId): Response
    {
        return $this->connector->send(new GetAttendanceRecordAttendanceLessonRegistrationRequest($schoolId, $termId));
    }

    public function getOffGames(string $schoolId, int $termId): Response
    {
        return $this->connector->send(new GetAttendanceRecordAttendanceOffGamesRequest($schoolId, $termId));
    }

    public function getOutOfClass(string $schoolId, int $termId): Response
    {
        return $this->connector->send(new GetAttendanceRecordAttendanceOutOfClassRequest($schoolId, $termId));
    }

    public function getOutOfSchool(string $schoolId, int $termId): Response
    {
        return $this->connector->send(new GetAttendanceRecordAttendanceOutOfSchoolRequest($schoolId, $termId));
    }

    public function getRegistration(string $schoolId, int $termId): Response
    {
        return $this->connector->send(new GetAttendanceRecordAttendanceRegistrationRequest($schoolId, $termId));
    }

    public function getRegistrationSummary(string $schoolId, int $termId): Response
    {
        return $this->connector->send(new GetAttendanceRecordAttendanceRegistrationSummaryRequest($schoolId, $termId));
    }
}
