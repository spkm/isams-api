<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Students;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\Students\StudentVisa;
use spkm\IsamsApi\Data\Students\StudentVisaForCreate;
use spkm\IsamsApi\Data\Students\StudentVisaForUpdate;
use spkm\IsamsApi\Requests\Students\Visas\CreateStudentVisaRequest;
use spkm\IsamsApi\Requests\Students\Visas\DeleteStudentVisaRequest;
use spkm\IsamsApi\Requests\Students\Visas\GetStudentVisaRequest;
use spkm\IsamsApi\Requests\Students\Visas\GetStudentVisasRequest;
use spkm\IsamsApi\Requests\Students\Visas\UpdateStudentVisaRequest;
use spkm\IsamsApi\Requests\Students\Visas\UpdateStudentVisasRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class VisasResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\StudentVisa>
     * @see \spkm\IsamsApi\Requests\Students\Visas\GetStudentVisasRequest
     */
    public function all(string $schoolId, ?string $expand = null): Collection
    {
        return $this->fetch(new GetStudentVisasRequest(schoolId: $schoolId, expand: $expand));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Students\StudentVisaForCreate|array<string, mixed>  $studentVisa
     * @see \spkm\IsamsApi\Requests\Students\Visas\CreateStudentVisaRequest
     */
    public function create(string $schoolId, StudentVisaForCreate|array $studentVisa): Created
    {
        return $this->fetch(new CreateStudentVisaRequest(schoolId: $schoolId, studentVisa: $studentVisa));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Students\Visas\DeleteStudentVisaRequest
     */
    public function delete(string $schoolId, int $id): bool
    {
        $this->fetch(new DeleteStudentVisaRequest(schoolId: $schoolId, id: $id));

        return true;
    }

    /**
     * @see \spkm\IsamsApi\Requests\Students\Visas\GetStudentVisaRequest
     */
    public function get(string $schoolId, int $id, ?string $expand = null): StudentVisa
    {
        return $this->fetch(new GetStudentVisaRequest(schoolId: $schoolId, id: $id, expand: $expand));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Students\StudentVisaForUpdate|array<string, mixed>  $studentVisa
     * @see \spkm\IsamsApi\Requests\Students\Visas\UpdateStudentVisaRequest
     */
    public function update(string $schoolId, int $id, StudentVisaForUpdate|array $studentVisa): bool
    {
        $this->fetch(new UpdateStudentVisaRequest(schoolId: $schoolId, id: $id, studentVisa: $studentVisa));

        return true;
    }

    /**
     * @param  array<int, \spkm\IsamsApi\Data\Students\StudentVisaForUpdate|array<string, mixed>>  $studentVisas
     * @see \spkm\IsamsApi\Requests\Students\Visas\UpdateStudentVisasRequest
     */
    public function updateMany(string $schoolId, array $studentVisas): bool
    {
        $this->fetch(new UpdateStudentVisasRequest(schoolId: $schoolId, studentVisas: $studentVisas));

        return true;
    }
}
