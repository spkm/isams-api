<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\CloudPortals\School\DisciplineRecords\GetDisciplineRecordDetentionRecordsForStudentRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class DisciplineRecordsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\DetentionRecord>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\DisciplineRecords\GetDisciplineRecordDetentionRecordsForStudentRequest
     */
    public function getDetentionRecordsForStudent(string $schoolId): Collection
    {
        return $this->fetch(new GetDisciplineRecordDetentionRecordsForStudentRequest(schoolId: $schoolId));
    }
}
