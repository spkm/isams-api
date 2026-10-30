<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Timetable;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\Timetable\TimetableImportRequestForCreate;
use spkm\IsamsApi\Requests\Timetable\Import\CompleteTimetableImportRequest;
use spkm\IsamsApi\Requests\Timetable\Import\CreateTimetableImportRequest;
use spkm\IsamsApi\Requests\Timetable\Import\DeleteActiveTimetableImportRequest;
use spkm\IsamsApi\Requests\Timetable\Import\GetActiveTimetableImportRequest;
use spkm\IsamsApi\Requests\Timetable\Import\GetTimetableImportResultRequest;

class ImportResource extends BaseResource
{
    public function complete(): Response
    {
        return $this->connector->send(new CompleteTimetableImportRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\Timetable\TimetableImportRequestForCreate|array<string, mixed>  $timetableImportRequest
     */
    public function create(TimetableImportRequestForCreate|array $timetableImportRequest): Response
    {
        return $this->connector->send(new CreateTimetableImportRequest($timetableImportRequest));
    }

    public function deleteActive(): Response
    {
        return $this->connector->send(new DeleteActiveTimetableImportRequest());
    }

    public function getActive(): Response
    {
        return $this->connector->send(new GetActiveTimetableImportRequest());
    }

    public function getResult(int $id): Response
    {
        return $this->connector->send(new GetTimetableImportResultRequest($id));
    }
}
