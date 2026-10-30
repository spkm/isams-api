<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Timetable;

use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\Timetable\TimetableImport;
use spkm\IsamsApi\Data\Timetable\TimetableImportRequestForCreate;
use spkm\IsamsApi\Data\Timetable\TimetableImportResult;
use spkm\IsamsApi\Requests\Timetable\Import\CompleteTimetableImportRequest;
use spkm\IsamsApi\Requests\Timetable\Import\CreateTimetableImportRequest;
use spkm\IsamsApi\Requests\Timetable\Import\DeleteActiveTimetableImportRequest;
use spkm\IsamsApi\Requests\Timetable\Import\GetActiveTimetableImportRequest;
use spkm\IsamsApi\Requests\Timetable\Import\GetTimetableImportResultRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class ImportResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\Timetable\Import\CompleteTimetableImportRequest
     */
    public function complete(): Created
    {
        return $this->fetch(new CompleteTimetableImportRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\Timetable\TimetableImportRequestForCreate|array<string, mixed>  $timetableImportRequest
     * @see \spkm\IsamsApi\Requests\Timetable\Import\CreateTimetableImportRequest
     */
    public function create(TimetableImportRequestForCreate|array $timetableImportRequest): Created
    {
        return $this->fetch(new CreateTimetableImportRequest(timetableImportRequest: $timetableImportRequest));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Timetable\Import\DeleteActiveTimetableImportRequest
     */
    public function deleteActive(): bool
    {
        $this->fetch(new DeleteActiveTimetableImportRequest());

        return true;
    }

    /**
     * @see \spkm\IsamsApi\Requests\Timetable\Import\GetActiveTimetableImportRequest
     */
    public function getActive(): TimetableImport
    {
        return $this->fetch(new GetActiveTimetableImportRequest());
    }

    /**
     * @see \spkm\IsamsApi\Requests\Timetable\Import\GetTimetableImportResultRequest
     */
    public function getResult(int $id): TimetableImportResult
    {
        return $this->fetch(new GetTimetableImportResultRequest(id: $id));
    }
}
