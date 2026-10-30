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
    public function all(string $schoolId): Response
    {
        return $this->connector->send(new GetStudentVaccinationsRequest($schoolId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\MedicalCentre\VaccinationForCreate|array<string, mixed>  $vaccination
     */
    public function create(string $schoolId, VaccinationForCreate|array $vaccination): Response
    {
        return $this->connector->send(new CreateStudentVaccinationRequest($schoolId, $vaccination));
    }

    public function delete(string $schoolId, string $vaccinationId): Response
    {
        return $this->connector->send(new DeleteStudentVaccinationRequest($schoolId, $vaccinationId));
    }

    public function get(string $schoolId, string $vaccinationId): Response
    {
        return $this->connector->send(new GetStudentVaccinationRequest($schoolId, $vaccinationId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patch(string $schoolId, string $vaccinationId, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchStudentVaccinationRequest($schoolId, $vaccinationId, $patch));
    }
}
