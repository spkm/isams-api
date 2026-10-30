<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Students;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\Students\StudentVisaForCreate;
use spkm\IsamsApi\Data\Students\StudentVisaForUpdate;
use spkm\IsamsApi\Requests\Students\Visas\CreateStudentVisaRequest;
use spkm\IsamsApi\Requests\Students\Visas\DeleteStudentVisaRequest;
use spkm\IsamsApi\Requests\Students\Visas\GetStudentVisaRequest;
use spkm\IsamsApi\Requests\Students\Visas\GetStudentVisasRequest;
use spkm\IsamsApi\Requests\Students\Visas\UpdateStudentVisaRequest;
use spkm\IsamsApi\Requests\Students\Visas\UpdateStudentVisasRequest;

class VisasResource extends BaseResource
{
    public function all(string $schoolId, ?string $expand = null): Response
    {
        return $this->connector->send(new GetStudentVisasRequest($schoolId, $expand));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Students\StudentVisaForCreate|array<string, mixed>  $studentVisa
     */
    public function create(string $schoolId, StudentVisaForCreate|array $studentVisa): Response
    {
        return $this->connector->send(new CreateStudentVisaRequest($schoolId, $studentVisa));
    }

    public function delete(string $schoolId, int $id): Response
    {
        return $this->connector->send(new DeleteStudentVisaRequest($schoolId, $id));
    }

    public function get(string $schoolId, int $id, ?string $expand = null): Response
    {
        return $this->connector->send(new GetStudentVisaRequest($schoolId, $id, $expand));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Students\StudentVisaForUpdate|array<string, mixed>  $studentVisa
     */
    public function update(string $schoolId, int $id, StudentVisaForUpdate|array $studentVisa): Response
    {
        return $this->connector->send(new UpdateStudentVisaRequest($schoolId, $id, $studentVisa));
    }

    /**
     * @param  list<\spkm\IsamsApi\Data\Students\StudentVisaForUpdate|array<string, mixed>>  $studentVisas
     */
    public function updateMany(string $schoolId, array $studentVisas): Response
    {
        return $this->connector->send(new UpdateStudentVisasRequest($schoolId, $studentVisas));
    }
}
