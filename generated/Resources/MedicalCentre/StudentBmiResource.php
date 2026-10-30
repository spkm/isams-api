<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\MedicalCentre;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\MedicalCentre\Bmi;
use spkm\IsamsApi\Data\MedicalCentre\BmiForCreate;
use spkm\IsamsApi\Requests\MedicalCentre\StudentBmi\CreateStudentBmiRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentBmi\DeleteStudentBmiRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentBmi\GetStudentBmiRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentBmi\GetStudentBmisRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentBmi\PatchStudentBmiRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class StudentBmiResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\MedicalCentre\Bmi>
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentBmi\GetStudentBmisRequest
     */
    public function all(string $schoolId, ?bool $includeArchive = null): Collection
    {
        return $this->fetch(new GetStudentBmisRequest(schoolId: $schoolId, includeArchive: $includeArchive));
    }

    /**
     * @param  \spkm\IsamsApi\Data\MedicalCentre\BmiForCreate|array<string, mixed>  $bmi
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentBmi\CreateStudentBmiRequest
     */
    public function create(string $schoolId, BmiForCreate|array $bmi): Created
    {
        return $this->fetch(new CreateStudentBmiRequest(schoolId: $schoolId, bmi: $bmi));
    }

    /**
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentBmi\DeleteStudentBmiRequest
     */
    public function delete(string $schoolId, string $bmiId): void
    {
        $this->fetch(new DeleteStudentBmiRequest(schoolId: $schoolId, bmiId: $bmiId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentBmi\GetStudentBmiRequest
     */
    public function get(string $schoolId, string $bmiId): Bmi
    {
        return $this->fetch(new GetStudentBmiRequest(schoolId: $schoolId, bmiId: $bmiId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentBmi\PatchStudentBmiRequest
     */
    public function patch(string $schoolId, string $bmiId, JsonPatch|array $patch): void
    {
        $this->fetch(new PatchStudentBmiRequest(schoolId: $schoolId, bmiId: $bmiId, patch: $patch));
    }
}
