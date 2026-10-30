<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\School\DisciplineRecords\GetDisciplineRecordDetentionRecordsForStudentRequest;

class DisciplineRecordsResource extends BaseResource
{
    public function getDetentionRecordsForStudent(string $schoolId): Response
    {
        return $this->connector->send(new GetDisciplineRecordDetentionRecordsForStudentRequest($schoolId));
    }
}
