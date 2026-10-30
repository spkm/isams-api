<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\MedicalCentre;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\MedicalCentre\VaccinationForCreate;
use spkm\IsamsApi\Requests\MedicalCentre\StudentVaccinations\CreateStudentVaccinationRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentVaccinations\DeleteStudentVaccinationRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentVaccinations\GetStudentVaccinationRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentVaccinations\GetStudentVaccinationsRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentVaccinations\PatchStudentVaccinationRequest;
use spkm\IsamsApi\Support\JsonPatch;

class StudentVaccinationsResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\MedicalCentre\VaccinationForCreate|array<string, mixed>  $vaccination
     */
    public function createStudentVaccination(string $schoolId, VaccinationForCreate|array $vaccination): Response
    {
        return $this->connector->send(new CreateStudentVaccinationRequest($schoolId, $vaccination));
    }

    public function deleteStudentVaccination(string $schoolId, string $vaccinationId): Response
    {
        return $this->connector->send(new DeleteStudentVaccinationRequest($schoolId, $vaccinationId));
    }

    public function getStudentVaccination(string $schoolId, string $vaccinationId): Response
    {
        return $this->connector->send(new GetStudentVaccinationRequest($schoolId, $vaccinationId));
    }

    public function getStudentVaccinations(string $schoolId): Response
    {
        return $this->connector->send(new GetStudentVaccinationsRequest($schoolId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patchStudentVaccination(string $schoolId, string $vaccinationId, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchStudentVaccinationRequest($schoolId, $vaccinationId, $patch));
    }
}
