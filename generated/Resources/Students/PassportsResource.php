<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Students;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\Students\StudentPassportForCreate;
use spkm\IsamsApi\Data\Students\StudentPassportForUpdate;
use spkm\IsamsApi\Requests\Students\Passports\CreateStudentPassportRequest;
use spkm\IsamsApi\Requests\Students\Passports\DeleteStudentPassportRequest;
use spkm\IsamsApi\Requests\Students\Passports\GetStudentPassportRequest;
use spkm\IsamsApi\Requests\Students\Passports\GetStudentPassportsRequest;
use spkm\IsamsApi\Requests\Students\Passports\UpdateStudentPassportRequest;
use spkm\IsamsApi\Requests\Students\Passports\UpdateStudentPassportsRequest;

class PassportsResource extends BaseResource
{
    public function all(string $schoolId, ?string $expand = null): Response
    {
        return $this->connector->send(new GetStudentPassportsRequest($schoolId, $expand));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Students\StudentPassportForCreate|array<string, mixed>  $studentPassport
     */
    public function create(string $schoolId, StudentPassportForCreate|array $studentPassport): Response
    {
        return $this->connector->send(new CreateStudentPassportRequest($schoolId, $studentPassport));
    }

    public function delete(string $schoolId, int $id): Response
    {
        return $this->connector->send(new DeleteStudentPassportRequest($schoolId, $id));
    }

    public function get(string $schoolId, int $id, ?string $expand = null): Response
    {
        return $this->connector->send(new GetStudentPassportRequest($schoolId, $id, $expand));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Students\StudentPassportForUpdate|array<string, mixed>  $studentPassport
     */
    public function update(string $schoolId, int $id, StudentPassportForUpdate|array $studentPassport): Response
    {
        return $this->connector->send(new UpdateStudentPassportRequest($schoolId, $id, $studentPassport));
    }

    /**
     * @param  list<\spkm\IsamsApi\Data\Students\StudentPassportForUpdate|array<string, mixed>>  $studentPassports
     */
    public function updateMany(string $schoolId, array $studentPassports): Response
    {
        return $this->connector->send(new UpdateStudentPassportsRequest($schoolId, $studentPassports));
    }
}
