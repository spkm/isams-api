<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Students;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\Students\StudentPassport;
use spkm\IsamsApi\Data\Students\StudentPassportForCreate;
use spkm\IsamsApi\Data\Students\StudentPassportForUpdate;
use spkm\IsamsApi\Requests\Students\Passports\CreateStudentPassportRequest;
use spkm\IsamsApi\Requests\Students\Passports\DeleteStudentPassportRequest;
use spkm\IsamsApi\Requests\Students\Passports\GetStudentPassportRequest;
use spkm\IsamsApi\Requests\Students\Passports\GetStudentPassportsRequest;
use spkm\IsamsApi\Requests\Students\Passports\UpdateStudentPassportRequest;
use spkm\IsamsApi\Requests\Students\Passports\UpdateStudentPassportsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class PassportsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\StudentPassport>
     * @see \spkm\IsamsApi\Requests\Students\Passports\GetStudentPassportsRequest
     */
    public function all(string $schoolId, ?string $expand = null): Collection
    {
        return $this->fetch(new GetStudentPassportsRequest(schoolId: $schoolId, expand: $expand));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Students\StudentPassportForCreate|array<string, mixed>  $studentPassport
     * @see \spkm\IsamsApi\Requests\Students\Passports\CreateStudentPassportRequest
     */
    public function create(string $schoolId, StudentPassportForCreate|array $studentPassport): Created
    {
        return $this->fetch(new CreateStudentPassportRequest(schoolId: $schoolId, studentPassport: $studentPassport));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Students\Passports\DeleteStudentPassportRequest
     */
    public function delete(string $schoolId, int $id): bool
    {
        $this->fetch(new DeleteStudentPassportRequest(schoolId: $schoolId, id: $id));

        return true;
    }

    /**
     * @see \spkm\IsamsApi\Requests\Students\Passports\GetStudentPassportRequest
     */
    public function get(string $schoolId, int $id, ?string $expand = null): StudentPassport
    {
        return $this->fetch(new GetStudentPassportRequest(schoolId: $schoolId, id: $id, expand: $expand));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Students\StudentPassportForUpdate|array<string, mixed>  $studentPassport
     * @see \spkm\IsamsApi\Requests\Students\Passports\UpdateStudentPassportRequest
     */
    public function update(string $schoolId, int $id, StudentPassportForUpdate|array $studentPassport): bool
    {
        $this->fetch(new UpdateStudentPassportRequest(schoolId: $schoolId, id: $id, studentPassport: $studentPassport));

        return true;
    }

    /**
     * @param  array<int, \spkm\IsamsApi\Data\Students\StudentPassportForUpdate|array<string, mixed>>  $studentPassports
     * @see \spkm\IsamsApi\Requests\Students\Passports\UpdateStudentPassportsRequest
     */
    public function updateMany(string $schoolId, array $studentPassports): bool
    {
        $this->fetch(new UpdateStudentPassportsRequest(schoolId: $schoolId, studentPassports: $studentPassports));

        return true;
    }
}
