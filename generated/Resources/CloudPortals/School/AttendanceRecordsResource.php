<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\CloudPortals\School\AttendanceRecords\GetAttendanceRecordAttendanceLessonRegistrationRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\AttendanceRecords\GetAttendanceRecordAttendanceOffGamesRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\AttendanceRecords\GetAttendanceRecordAttendanceOutOfClassRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\AttendanceRecords\GetAttendanceRecordAttendanceOutOfSchoolRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\AttendanceRecords\GetAttendanceRecordAttendanceRegistrationRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\AttendanceRecords\GetAttendanceRecordAttendanceRegistrationSummaryRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class AttendanceRecordsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\AttendanceRecord>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\AttendanceRecords\GetAttendanceRecordAttendanceLessonRegistrationRequest
     */
    public function getLessonRegistration(string $schoolId, int $termId): Collection
    {
        return $this->fetch(new GetAttendanceRecordAttendanceLessonRegistrationRequest(schoolId: $schoolId, termId: $termId));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\AttendanceRecord>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\AttendanceRecords\GetAttendanceRecordAttendanceOffGamesRequest
     */
    public function getOffGames(string $schoolId, int $termId): Collection
    {
        return $this->fetch(new GetAttendanceRecordAttendanceOffGamesRequest(schoolId: $schoolId, termId: $termId));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\AttendanceRecord>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\AttendanceRecords\GetAttendanceRecordAttendanceOutOfClassRequest
     */
    public function getOutOfClass(string $schoolId, int $termId): Collection
    {
        return $this->fetch(new GetAttendanceRecordAttendanceOutOfClassRequest(schoolId: $schoolId, termId: $termId));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\AttendanceRecord>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\AttendanceRecords\GetAttendanceRecordAttendanceOutOfSchoolRequest
     */
    public function getOutOfSchool(string $schoolId, int $termId): Collection
    {
        return $this->fetch(new GetAttendanceRecordAttendanceOutOfSchoolRequest(schoolId: $schoolId, termId: $termId));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\AttendanceRecord>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\AttendanceRecords\GetAttendanceRecordAttendanceRegistrationRequest
     */
    public function getRegistration(string $schoolId, int $termId): Collection
    {
        return $this->fetch(new GetAttendanceRecordAttendanceRegistrationRequest(schoolId: $schoolId, termId: $termId));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\AttendanceRecord>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\AttendanceRecords\GetAttendanceRecordAttendanceRegistrationSummaryRequest
     */
    public function getRegistrationSummary(string $schoolId, int $termId): Collection
    {
        return $this->fetch(new GetAttendanceRecordAttendanceRegistrationSummaryRequest(schoolId: $schoolId, termId: $termId));
    }
}
