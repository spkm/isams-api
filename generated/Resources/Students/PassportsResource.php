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
    /**
     * @param  \spkm\IsamsApi\Data\Students\StudentPassportForCreate|array<string, mixed>  $passport
     */
    public function createStudentPassport(string $schoolId, StudentPassportForCreate|array $passport): Response
    {
        return $this->connector->send(new CreateStudentPassportRequest($schoolId, $passport));
    }

    public function deleteStudentPassport(string $schoolId, int $id): Response
    {
        return $this->connector->send(new DeleteStudentPassportRequest($schoolId, $id));
    }

    public function getStudentPassport(string $schoolId, int $id, ?string $expand = null): Response
    {
        return $this->connector->send(new GetStudentPassportRequest($schoolId, $id, $expand));
    }

    public function getStudentPassports(string $schoolId, ?string $expand = null): Response
    {
        return $this->connector->send(new GetStudentPassportsRequest($schoolId, $expand));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Students\StudentPassportForUpdate|array<string, mixed>  $passport
     */
    public function updateStudentPassport(
        string $schoolId,
        int $id,
        StudentPassportForUpdate|array $passport,
    ): Response {
        return $this->connector->send(new UpdateStudentPassportRequest($schoolId, $id, $passport));
    }

    /**
     * @param  list<\spkm\IsamsApi\Data\Students\StudentPassportForUpdate|array<string, mixed>>  $passports
     */
    public function updateStudentPassports(string $schoolId, array $passports): Response
    {
        return $this->connector->send(new UpdateStudentPassportsRequest($schoolId, $passports));
    }
}
