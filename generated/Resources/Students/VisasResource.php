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
    /**
     * @param  \spkm\IsamsApi\Data\Students\StudentVisaForCreate|array<string, mixed>  $visa
     */
    public function createStudentVisa(string $schoolId, StudentVisaForCreate|array $visa): Response
    {
        return $this->connector->send(new CreateStudentVisaRequest($schoolId, $visa));
    }

    public function deleteStudentVisa(string $schoolId, int $id): Response
    {
        return $this->connector->send(new DeleteStudentVisaRequest($schoolId, $id));
    }

    public function getStudentVisa(string $schoolId, int $id, ?string $expand = null): Response
    {
        return $this->connector->send(new GetStudentVisaRequest($schoolId, $id, $expand));
    }

    public function getStudentVisas(string $schoolId, ?string $expand = null): Response
    {
        return $this->connector->send(new GetStudentVisasRequest($schoolId, $expand));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Students\StudentVisaForUpdate|array<string, mixed>  $visa
     */
    public function updateStudentVisa(string $schoolId, int $id, StudentVisaForUpdate|array $visa): Response
    {
        return $this->connector->send(new UpdateStudentVisaRequest($schoolId, $id, $visa));
    }

    /**
     * @param  list<\spkm\IsamsApi\Data\Students\StudentVisaForUpdate|array<string, mixed>>  $visas
     */
    public function updateStudentVisas(string $schoolId, array $visas): Response
    {
        return $this->connector->send(new UpdateStudentVisasRequest($schoolId, $visas));
    }
}
