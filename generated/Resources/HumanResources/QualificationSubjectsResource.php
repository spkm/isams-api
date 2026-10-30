<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\HumanResources\QualificationSubjects\CreateQualificationSubjectRequest;
use spkm\IsamsApi\Requests\HumanResources\QualificationSubjects\DeleteQualificationSubjectRequest;
use spkm\IsamsApi\Requests\HumanResources\QualificationSubjects\GetQualificationSubjectsRequest;
use spkm\IsamsApi\Requests\HumanResources\QualificationSubjects\UpdateQualificationSubjectRequest;

class QualificationSubjectsResource extends BaseResource
{
    public function all(): Response
    {
        return $this->connector->send(new GetQualificationSubjectsRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate|array<string, mixed>  $listItem
     */
    public function create(GlobalListItemForCreate|array $listItem): Response
    {
        return $this->connector->send(new CreateQualificationSubjectRequest($listItem));
    }

    public function delete(int $id): Response
    {
        return $this->connector->send(new DeleteQualificationSubjectRequest($id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate|array<string, mixed>  $listItem
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): Response
    {
        return $this->connector->send(new UpdateQualificationSubjectRequest($id, $listItem));
    }
}
