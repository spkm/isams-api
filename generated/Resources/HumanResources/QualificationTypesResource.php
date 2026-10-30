<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\HumanResources\QualificationTypes\CreateQualificationTypeRequest;
use spkm\IsamsApi\Requests\HumanResources\QualificationTypes\DeleteQualificationTypeRequest;
use spkm\IsamsApi\Requests\HumanResources\QualificationTypes\GetQualificationTypesRequest;
use spkm\IsamsApi\Requests\HumanResources\QualificationTypes\UpdateQualificationTypeRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class QualificationTypesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\HumanResources\GlobalListItem>
     * @see \spkm\IsamsApi\Requests\HumanResources\QualificationTypes\GetQualificationTypesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetQualificationTypesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\HumanResources\QualificationTypes\CreateQualificationTypeRequest
     */
    public function create(GlobalListItemForCreate|array $listItem): Created
    {
        return $this->fetch(new CreateQualificationTypeRequest(listItem: $listItem));
    }

    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\QualificationTypes\DeleteQualificationTypeRequest
     */
    public function delete(int $id): void
    {
        $this->fetch(new DeleteQualificationTypeRequest(id: $id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\HumanResources\QualificationTypes\UpdateQualificationTypeRequest
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): void
    {
        $this->fetch(new UpdateQualificationTypeRequest(id: $id, listItem: $listItem));
    }
}
