<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\MedicalCentre;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\MedicalCentre\MedicationForCreate;
use spkm\IsamsApi\Requests\MedicalCentre\StudentMedication\ArchiveStudentMedicationRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentMedication\CreateStudentMedicationRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentMedication\DeleteStudentMedicationRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentMedication\GetStudentMedicationRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentMedication\GetStudentMedicationsRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentMedication\PatchStudentMedicationRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentMedication\RestoreStudentMedicationRequest;
use spkm\IsamsApi\Support\JsonPatch;

class StudentMedicationResource extends BaseResource
{
    public function all(string $schoolId, ?bool $includeArchive = null): Response
    {
        return $this->connector->send(new GetStudentMedicationsRequest($schoolId, $includeArchive));
    }

    public function archive(string $schoolId, string $medicationId): Response
    {
        return $this->connector->send(new ArchiveStudentMedicationRequest($schoolId, $medicationId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\MedicalCentre\MedicationForCreate|array<string, mixed>  $medication
     */
    public function create(string $schoolId, MedicationForCreate|array $medication): Response
    {
        return $this->connector->send(new CreateStudentMedicationRequest($schoolId, $medication));
    }

    public function delete(string $schoolId, string $medicationId): Response
    {
        return $this->connector->send(new DeleteStudentMedicationRequest($schoolId, $medicationId));
    }

    public function get(string $schoolId, string $medicationId): Response
    {
        return $this->connector->send(new GetStudentMedicationRequest($schoolId, $medicationId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patch(string $schoolId, string $medicationId, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchStudentMedicationRequest($schoolId, $medicationId, $patch));
    }

    public function restore(string $schoolId, string $medicationId): Response
    {
        return $this->connector->send(new RestoreStudentMedicationRequest($schoolId, $medicationId));
    }
}
