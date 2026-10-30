<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\HumanResources\AbsenceTypeForCreate;
use spkm\IsamsApi\Data\HumanResources\AbsenceTypeForUpdate;
use spkm\IsamsApi\Requests\HumanResources\AbsenceTypes\CreateAbsenceTypeRequest;
use spkm\IsamsApi\Requests\HumanResources\AbsenceTypes\GetAbsenceTypeRequest;
use spkm\IsamsApi\Requests\HumanResources\AbsenceTypes\GetAbsenceTypesRequest;
use spkm\IsamsApi\Requests\HumanResources\AbsenceTypes\UpdateAbsenceTypeRequest;

class AbsenceTypesResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\AbsenceTypeForCreate|array<string, mixed>  $absenceType
     */
    public function createAbsenceType(AbsenceTypeForCreate|array $absenceType): Response
    {
        return $this->connector->send(new CreateAbsenceTypeRequest($absenceType));
    }

    public function getAbsenceType(int $id): Response
    {
        return $this->connector->send(new GetAbsenceTypeRequest($id));
    }

    public function getAbsenceTypes(): Response
    {
        return $this->connector->send(new GetAbsenceTypesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\AbsenceTypeForUpdate|array<string, mixed>  $absenceType
     */
    public function updateAbsenceType(int $id, AbsenceTypeForUpdate|array $absenceType): Response
    {
        return $this->connector->send(new UpdateAbsenceTypeRequest($id, $absenceType));
    }
}
