<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\MedicalCentre;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\MedicalCentre\Medication;
use spkm\IsamsApi\Data\MedicalCentre\MedicationForCreate;
use spkm\IsamsApi\Requests\MedicalCentre\StudentMedication\ArchiveStudentMedicationRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentMedication\CreateStudentMedicationRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentMedication\DeleteStudentMedicationRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentMedication\GetStudentMedicationRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentMedication\GetStudentMedicationsRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentMedication\PatchStudentMedicationRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentMedication\RestoreStudentMedicationRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class StudentMedicationResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\MedicalCentre\Medication>
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentMedication\GetStudentMedicationsRequest
     */
    public function all(string $schoolId, ?bool $includeArchive = null): Collection
    {
        return $this->fetch(new GetStudentMedicationsRequest(schoolId: $schoolId, includeArchive: $includeArchive));
    }

    /**
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentMedication\ArchiveStudentMedicationRequest
     */
    public function archive(string $schoolId, string $medicationId): Created
    {
        return $this->fetch(new ArchiveStudentMedicationRequest(schoolId: $schoolId, medicationId: $medicationId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\MedicalCentre\MedicationForCreate|array<string, mixed>  $medication
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentMedication\CreateStudentMedicationRequest
     */
    public function create(string $schoolId, MedicationForCreate|array $medication): Created
    {
        return $this->fetch(new CreateStudentMedicationRequest(schoolId: $schoolId, medication: $medication));
    }

    /**
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentMedication\DeleteStudentMedicationRequest
     */
    public function delete(string $schoolId, string $medicationId): void
    {
        $this->fetch(new DeleteStudentMedicationRequest(schoolId: $schoolId, medicationId: $medicationId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentMedication\GetStudentMedicationRequest
     */
    public function get(string $schoolId, string $medicationId): Medication
    {
        return $this->fetch(new GetStudentMedicationRequest(schoolId: $schoolId, medicationId: $medicationId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentMedication\PatchStudentMedicationRequest
     */
    public function patch(string $schoolId, string $medicationId, JsonPatch|array $patch): void
    {
        $this->fetch(new PatchStudentMedicationRequest(schoolId: $schoolId, medicationId: $medicationId, patch: $patch));
    }

    /**
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentMedication\RestoreStudentMedicationRequest
     */
    public function restore(string $schoolId, string $medicationId): Created
    {
        return $this->fetch(new RestoreStudentMedicationRequest(schoolId: $schoolId, medicationId: $medicationId));
    }
}
