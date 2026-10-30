<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\StudentRegisters;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\StudentRegisters\Fields\GetFieldsRequest;
use spkm\IsamsApi\Requests\StudentRegisters\Fields\GetStudentFieldsRequest;
use spkm\IsamsApi\Requests\StudentRegisters\Fields\PatchStudentFieldsRequest;

class FieldsResource extends BaseResource
{
    public function getFields(
        int $registerId,
        ?string $systemStatus = null,
        ?int $page = null,
        ?int $pageSize = null,
    ): Response {
        return $this->connector->send(new GetFieldsRequest($registerId, $systemStatus, $page, $pageSize));
    }

    public function getStudentFields(int $registerId, string $schoolId): Response
    {
        return $this->connector->send(new GetStudentFieldsRequest($registerId, $schoolId));
    }

    /**
     * @param  array<mixed>  $values
     */
    public function patchStudentFields(int $registerId, string $schoolId, array $values): Response
    {
        return $this->connector->send(new PatchStudentFieldsRequest($registerId, $schoolId, $values));
    }
}
