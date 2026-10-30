<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\MedicalCentre;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\MedicalCentre\Condition;
use spkm\IsamsApi\Data\MedicalCentre\ConditionForCreate;
use spkm\IsamsApi\Requests\MedicalCentre\StudentConditions\ArchiveStudentConditionRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentConditions\CreateStudentConditionRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentConditions\DeleteStudentConditionRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentConditions\GetStudentConditionRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentConditions\GetStudentConditionsRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentConditions\PatchStudentConditionRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentConditions\RestoreStudentConditionRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class StudentConditionsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\MedicalCentre\Condition>
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentConditions\GetStudentConditionsRequest
     */
    public function all(string $schoolId, ?bool $includeArchive = null): Collection
    {
        return $this->fetch(new GetStudentConditionsRequest(schoolId: $schoolId, includeArchive: $includeArchive));
    }

    /**
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentConditions\ArchiveStudentConditionRequest
     */
    public function archive(string $schoolId, string $conditionId): Created
    {
        return $this->fetch(new ArchiveStudentConditionRequest(schoolId: $schoolId, conditionId: $conditionId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\MedicalCentre\ConditionForCreate|array<string, mixed>  $condition
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentConditions\CreateStudentConditionRequest
     */
    public function create(string $schoolId, ConditionForCreate|array $condition): Created
    {
        return $this->fetch(new CreateStudentConditionRequest(schoolId: $schoolId, condition: $condition));
    }

    /**
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentConditions\DeleteStudentConditionRequest
     */
    public function delete(string $schoolId, string $conditionId): void
    {
        $this->fetch(new DeleteStudentConditionRequest(schoolId: $schoolId, conditionId: $conditionId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentConditions\GetStudentConditionRequest
     */
    public function get(string $schoolId, string $conditionId): Condition
    {
        return $this->fetch(new GetStudentConditionRequest(schoolId: $schoolId, conditionId: $conditionId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentConditions\PatchStudentConditionRequest
     */
    public function patch(string $schoolId, string $conditionId, JsonPatch|array $patch): void
    {
        $this->fetch(new PatchStudentConditionRequest(schoolId: $schoolId, conditionId: $conditionId, patch: $patch));
    }

    /**
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentConditions\RestoreStudentConditionRequest
     */
    public function restore(string $schoolId, string $conditionId): Created
    {
        return $this->fetch(new RestoreStudentConditionRequest(schoolId: $schoolId, conditionId: $conditionId));
    }
}
