<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\HumanResources\QualificationSubjects\CreateQualificationSubjectRequest;
use spkm\IsamsApi\Requests\HumanResources\QualificationSubjects\DeleteQualificationSubjectRequest;
use spkm\IsamsApi\Requests\HumanResources\QualificationSubjects\GetQualificationSubjectsRequest;
use spkm\IsamsApi\Requests\HumanResources\QualificationSubjects\UpdateQualificationSubjectRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class QualificationSubjectsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\HumanResources\GlobalListItem>
     * @see \spkm\IsamsApi\Requests\HumanResources\QualificationSubjects\GetQualificationSubjectsRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetQualificationSubjectsRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\HumanResources\QualificationSubjects\CreateQualificationSubjectRequest
     */
    public function create(GlobalListItemForCreate|array $listItem): Created
    {
        return $this->fetch(new CreateQualificationSubjectRequest(listItem: $listItem));
    }

    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\QualificationSubjects\DeleteQualificationSubjectRequest
     */
    public function delete(int $id): bool
    {
        $this->fetch(new DeleteQualificationSubjectRequest(id: $id));

        return true;
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\HumanResources\QualificationSubjects\UpdateQualificationSubjectRequest
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): bool
    {
        $this->fetch(new UpdateQualificationSubjectRequest(id: $id, listItem: $listItem));

        return true;
    }
}
