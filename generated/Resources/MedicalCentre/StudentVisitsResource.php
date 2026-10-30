<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\MedicalCentre;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\MedicalCentre\VisitForCreate;
use spkm\IsamsApi\Requests\MedicalCentre\StudentVisits\CreateStudentVisitRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentVisits\DeleteStudentVisitRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentVisits\GetStudentVisitRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentVisits\GetStudentVisitsRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentVisits\PatchStudentVisitRequest;
use spkm\IsamsApi\Support\JsonPatch;

class StudentVisitsResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\MedicalCentre\VisitForCreate|array<string, mixed>  $visit
     */
    public function createStudentVisit(string $schoolId, VisitForCreate|array $visit): Response
    {
        return $this->connector->send(new CreateStudentVisitRequest($schoolId, $visit));
    }

    public function deleteStudentVisit(string $schoolId, string $visitId): Response
    {
        return $this->connector->send(new DeleteStudentVisitRequest($schoolId, $visitId));
    }

    public function getStudentVisit(string $schoolId, string $visitId): Response
    {
        return $this->connector->send(new GetStudentVisitRequest($schoolId, $visitId));
    }

    public function getStudentVisits(string $schoolId): Response
    {
        return $this->connector->send(new GetStudentVisitsRequest($schoolId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patchStudentVisit(string $schoolId, string $visitId, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchStudentVisitRequest($schoolId, $visitId, $patch));
    }
}
