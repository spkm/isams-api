<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\MedicalCentre;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\MedicalCentre\ConditionForCreate;
use spkm\IsamsApi\Requests\MedicalCentre\StudentConditions\ArchiveStudentConditionRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentConditions\CreateStudentConditionRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentConditions\DeleteStudentConditionRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentConditions\GetStudentConditionRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentConditions\GetStudentConditionsRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentConditions\PatchStudentConditionRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentConditions\RestoreStudentConditionRequest;
use spkm\IsamsApi\Support\JsonPatch;

class StudentConditionsResource extends BaseResource
{
    public function archiveStudentCondition(string $schoolId, string $conditionId): Response
    {
        return $this->connector->send(new ArchiveStudentConditionRequest($schoolId, $conditionId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\MedicalCentre\ConditionForCreate|array<string, mixed>  $condition
     */
    public function createStudentCondition(string $schoolId, ConditionForCreate|array $condition): Response
    {
        return $this->connector->send(new CreateStudentConditionRequest($schoolId, $condition));
    }

    public function deleteStudentCondition(string $schoolId, string $conditionId): Response
    {
        return $this->connector->send(new DeleteStudentConditionRequest($schoolId, $conditionId));
    }

    public function getStudentCondition(string $schoolId, string $conditionId): Response
    {
        return $this->connector->send(new GetStudentConditionRequest($schoolId, $conditionId));
    }

    public function getStudentConditions(string $schoolId, ?bool $includeArchive = null): Response
    {
        return $this->connector->send(new GetStudentConditionsRequest($schoolId, $includeArchive));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patchStudentCondition(string $schoolId, string $conditionId, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchStudentConditionRequest($schoolId, $conditionId, $patch));
    }

    public function restoreStudentCondition(string $schoolId, string $conditionId): Response
    {
        return $this->connector->send(new RestoreStudentConditionRequest($schoolId, $conditionId));
    }
}
