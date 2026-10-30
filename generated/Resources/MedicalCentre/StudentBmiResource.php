<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\MedicalCentre;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\MedicalCentre\BmiForCreate;
use spkm\IsamsApi\Requests\MedicalCentre\StudentBmi\CreateStudentBmiRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentBmi\DeleteStudentBmiRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentBmi\GetStudentBmiRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentBmi\GetStudentBmisRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentBmi\PatchStudentBmiRequest;
use spkm\IsamsApi\Support\JsonPatch;

class StudentBmiResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\MedicalCentre\BmiForCreate|array<string, mixed>  $bmi
     */
    public function createStudentBmi(string $schoolId, BmiForCreate|array $bmi): Response
    {
        return $this->connector->send(new CreateStudentBmiRequest($schoolId, $bmi));
    }

    public function deleteStudentBmi(string $schoolId, string $bmiId): Response
    {
        return $this->connector->send(new DeleteStudentBmiRequest($schoolId, $bmiId));
    }

    public function getStudentBmi(string $schoolId, string $bmiId): Response
    {
        return $this->connector->send(new GetStudentBmiRequest($schoolId, $bmiId));
    }

    public function getStudentBmis(string $schoolId, ?bool $includeArchive = null): Response
    {
        return $this->connector->send(new GetStudentBmisRequest($schoolId, $includeArchive));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patchStudentBmi(string $schoolId, string $bmiId, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchStudentBmiRequest($schoolId, $bmiId, $patch));
    }
}
