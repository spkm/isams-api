<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\HumanResources\AbsenceType;
use spkm\IsamsApi\Data\HumanResources\AbsenceTypeForCreate;
use spkm\IsamsApi\Data\HumanResources\AbsenceTypeForUpdate;
use spkm\IsamsApi\Requests\HumanResources\AbsenceTypes\CreateAbsenceTypeRequest;
use spkm\IsamsApi\Requests\HumanResources\AbsenceTypes\GetAbsenceTypeRequest;
use spkm\IsamsApi\Requests\HumanResources\AbsenceTypes\GetAbsenceTypesRequest;
use spkm\IsamsApi\Requests\HumanResources\AbsenceTypes\UpdateAbsenceTypeRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class AbsenceTypesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\HumanResources\AbsenceType>
     * @see \spkm\IsamsApi\Requests\HumanResources\AbsenceTypes\GetAbsenceTypesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetAbsenceTypesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\AbsenceTypeForCreate|array<string, mixed>  $absenceType
     * @see \spkm\IsamsApi\Requests\HumanResources\AbsenceTypes\CreateAbsenceTypeRequest
     */
    public function create(AbsenceTypeForCreate|array $absenceType): Created
    {
        return $this->fetch(new CreateAbsenceTypeRequest(absenceType: $absenceType));
    }

    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\AbsenceTypes\GetAbsenceTypeRequest
     */
    public function get(int $id): AbsenceType
    {
        return $this->fetch(new GetAbsenceTypeRequest(id: $id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\AbsenceTypeForUpdate|array<string, mixed>  $absenceType
     * @see \spkm\IsamsApi\Requests\HumanResources\AbsenceTypes\UpdateAbsenceTypeRequest
     */
    public function update(int $id, AbsenceTypeForUpdate|array $absenceType): void
    {
        $this->fetch(new UpdateAbsenceTypeRequest(id: $id, absenceType: $absenceType));
    }
}
