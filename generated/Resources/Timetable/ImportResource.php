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
    public function completeTimetableImport(): Response
    {
        return $this->connector->send(new CompleteTimetableImportRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\Timetable\TimetableImportRequestForCreate|array<string, mixed>  $request
     */
    public function createTimetableImport(TimetableImportRequestForCreate|array $request): Response
    {
        return $this->connector->send(new CreateTimetableImportRequest($request));
    }

    public function deleteActiveTimetableImport(): Response
    {
        return $this->connector->send(new DeleteActiveTimetableImportRequest());
    }

    public function getActiveTimetableImport(): Response
    {
        return $this->connector->send(new GetActiveTimetableImportRequest());
    }

    public function getTimetableImportResult(int $id): Response
    {
        return $this->connector->send(new GetTimetableImportResultRequest($id));
    }
}
