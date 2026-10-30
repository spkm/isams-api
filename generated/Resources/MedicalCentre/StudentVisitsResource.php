<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\MedicalCentre;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\MedicalCentre\Visit;
use spkm\IsamsApi\Data\MedicalCentre\VisitForCreate;
use spkm\IsamsApi\Requests\MedicalCentre\StudentVisits\CreateStudentVisitRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentVisits\DeleteStudentVisitRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentVisits\GetStudentVisitRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentVisits\GetStudentVisitsRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentVisits\PatchStudentVisitRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class StudentVisitsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\MedicalCentre\Visit>
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentVisits\GetStudentVisitsRequest
     */
    public function all(string $schoolId): Collection
    {
        return $this->fetch(new GetStudentVisitsRequest(schoolId: $schoolId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\MedicalCentre\VisitForCreate|array<string, mixed>  $visit
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentVisits\CreateStudentVisitRequest
     */
    public function create(string $schoolId, VisitForCreate|array $visit): Created
    {
        return $this->fetch(new CreateStudentVisitRequest(schoolId: $schoolId, visit: $visit));
    }

    /**
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentVisits\DeleteStudentVisitRequest
     */
    public function delete(string $schoolId, string $visitId): void
    {
        $this->fetch(new DeleteStudentVisitRequest(schoolId: $schoolId, visitId: $visitId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentVisits\GetStudentVisitRequest
     */
    public function get(string $schoolId, string $visitId): Visit
    {
        return $this->fetch(new GetStudentVisitRequest(schoolId: $schoolId, visitId: $visitId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentVisits\PatchStudentVisitRequest
     */
    public function patch(string $schoolId, string $visitId, JsonPatch|array $patch): void
    {
        $this->fetch(new PatchStudentVisitRequest(schoolId: $schoolId, visitId: $visitId, patch: $patch));
    }
}
