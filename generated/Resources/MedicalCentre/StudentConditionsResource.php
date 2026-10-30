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
    public function all(string $schoolId, ?bool $includeArchive = null): Response
    {
        return $this->connector->send(new GetStudentConditionsRequest($schoolId, $includeArchive));
    }

    public function archive(string $schoolId, string $conditionId): Response
    {
        return $this->connector->send(new ArchiveStudentConditionRequest($schoolId, $conditionId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\MedicalCentre\ConditionForCreate|array<string, mixed>  $condition
     */
    public function create(string $schoolId, ConditionForCreate|array $condition): Response
    {
        return $this->connector->send(new CreateStudentConditionRequest($schoolId, $condition));
    }

    public function delete(string $schoolId, string $conditionId): Response
    {
        return $this->connector->send(new DeleteStudentConditionRequest($schoolId, $conditionId));
    }

    public function get(string $schoolId, string $conditionId): Response
    {
        return $this->connector->send(new GetStudentConditionRequest($schoolId, $conditionId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patch(string $schoolId, string $conditionId, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchStudentConditionRequest($schoolId, $conditionId, $patch));
    }

    public function restore(string $schoolId, string $conditionId): Response
    {
        return $this->connector->send(new RestoreStudentConditionRequest($schoolId, $conditionId));
    }
}
