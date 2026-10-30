<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\MedicalCentre;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\MedicalCentre\Vaccination;
use spkm\IsamsApi\Data\MedicalCentre\VaccinationForCreate;
use spkm\IsamsApi\Requests\MedicalCentre\StudentVaccinations\CreateStudentVaccinationRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentVaccinations\DeleteStudentVaccinationRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentVaccinations\GetStudentVaccinationRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentVaccinations\GetStudentVaccinationsRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentVaccinations\PatchStudentVaccinationRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class StudentVaccinationsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\MedicalCentre\Vaccination>
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentVaccinations\GetStudentVaccinationsRequest
     */
    public function all(string $schoolId): Collection
    {
        return $this->fetch(new GetStudentVaccinationsRequest(schoolId: $schoolId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\MedicalCentre\VaccinationForCreate|array<string, mixed>  $vaccination
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentVaccinations\CreateStudentVaccinationRequest
     */
    public function create(string $schoolId, VaccinationForCreate|array $vaccination): Created
    {
        return $this->fetch(new CreateStudentVaccinationRequest(schoolId: $schoolId, vaccination: $vaccination));
    }

    /**
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentVaccinations\DeleteStudentVaccinationRequest
     */
    public function delete(string $schoolId, string $vaccinationId): bool
    {
        $this->fetch(new DeleteStudentVaccinationRequest(schoolId: $schoolId, vaccinationId: $vaccinationId));

        return true;
    }

    /**
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentVaccinations\GetStudentVaccinationRequest
     */
    public function get(string $schoolId, string $vaccinationId): Vaccination
    {
        return $this->fetch(new GetStudentVaccinationRequest(schoolId: $schoolId, vaccinationId: $vaccinationId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentVaccinations\PatchStudentVaccinationRequest
     */
    public function patch(string $schoolId, string $vaccinationId, JsonPatch|array $patch): bool
    {
        $this->fetch(new PatchStudentVaccinationRequest(schoolId: $schoolId, vaccinationId: $vaccinationId, patch: $patch));

        return true;
    }
}
