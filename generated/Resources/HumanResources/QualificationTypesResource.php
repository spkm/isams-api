<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\HumanResources\QualificationTypes\CreateQualificationTypeRequest;
use spkm\IsamsApi\Requests\HumanResources\QualificationTypes\DeleteQualificationTypeRequest;
use spkm\IsamsApi\Requests\HumanResources\QualificationTypes\GetQualificationTypesRequest;
use spkm\IsamsApi\Requests\HumanResources\QualificationTypes\UpdateQualificationTypeRequest;

class QualificationTypesResource extends BaseResource
{
    public function all(): Response
    {
        return $this->connector->send(new GetQualificationTypesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate|array<string, mixed>  $listItem
     */
    public function create(GlobalListItemForCreate|array $listItem): Response
    {
        return $this->connector->send(new CreateQualificationTypeRequest($listItem));
    }

    public function delete(int $id): Response
    {
        return $this->connector->send(new DeleteQualificationTypeRequest($id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate|array<string, mixed>  $listItem
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): Response
    {
        return $this->connector->send(new UpdateQualificationTypeRequest($id, $listItem));
    }
}
