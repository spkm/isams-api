<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\HumanResources\QualificationLevels\CreateQualificationLevelRequest;
use spkm\IsamsApi\Requests\HumanResources\QualificationLevels\DeleteQualificationLevelRequest;
use spkm\IsamsApi\Requests\HumanResources\QualificationLevels\GetQualificationLevelsRequest;
use spkm\IsamsApi\Requests\HumanResources\QualificationLevels\UpdateQualificationLevelRequest;

class QualificationLevelsResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate|array<string, mixed>  $globalListItem
     */
    public function createQualificationLevel(GlobalListItemForCreate|array $globalListItem): Response
    {
        return $this->connector->send(new CreateQualificationLevelRequest($globalListItem));
    }

    public function deleteQualificationLevel(int $id): Response
    {
        return $this->connector->send(new DeleteQualificationLevelRequest($id));
    }

    public function getQualificationLevels(): Response
    {
        return $this->connector->send(new GetQualificationLevelsRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate|array<string, mixed>  $globalListItem
     */
    public function updateQualificationLevel(int $id, GlobalListItemForUpdate|array $globalListItem): Response
    {
        return $this->connector->send(new UpdateQualificationLevelRequest($id, $globalListItem));
    }
}
