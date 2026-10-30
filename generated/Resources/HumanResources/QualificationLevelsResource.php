<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\HumanResources\QualificationLevels\CreateQualificationLevelRequest;
use spkm\IsamsApi\Requests\HumanResources\QualificationLevels\DeleteQualificationLevelRequest;
use spkm\IsamsApi\Requests\HumanResources\QualificationLevels\GetQualificationLevelsRequest;
use spkm\IsamsApi\Requests\HumanResources\QualificationLevels\UpdateQualificationLevelRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class QualificationLevelsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\HumanResources\GlobalListItem>
     * @see \spkm\IsamsApi\Requests\HumanResources\QualificationLevels\GetQualificationLevelsRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetQualificationLevelsRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\HumanResources\QualificationLevels\CreateQualificationLevelRequest
     */
    public function create(GlobalListItemForCreate|array $listItem): Created
    {
        return $this->fetch(new CreateQualificationLevelRequest(listItem: $listItem));
    }

    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\QualificationLevels\DeleteQualificationLevelRequest
     */
    public function delete(int $id): void
    {
        $this->fetch(new DeleteQualificationLevelRequest(id: $id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\HumanResources\QualificationLevels\UpdateQualificationLevelRequest
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): void
    {
        $this->fetch(new UpdateQualificationLevelRequest(id: $id, listItem: $listItem));
    }
}
