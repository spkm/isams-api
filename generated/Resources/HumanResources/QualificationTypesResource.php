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
    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate|array<string, mixed>  $globalListItem
     */
    public function createQualificationType(GlobalListItemForCreate|array $globalListItem): Response
    {
        return $this->connector->send(new CreateQualificationTypeRequest($globalListItem));
    }

    public function deleteQualificationType(int $id): Response
    {
        return $this->connector->send(new DeleteQualificationTypeRequest($id));
    }

    public function getQualificationTypes(): Response
    {
        return $this->connector->send(new GetQualificationTypesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate|array<string, mixed>  $globalListItem
     */
    public function updateQualificationType(int $id, GlobalListItemForUpdate|array $globalListItem): Response
    {
        return $this->connector->send(new UpdateQualificationTypeRequest($id, $globalListItem));
    }
}
