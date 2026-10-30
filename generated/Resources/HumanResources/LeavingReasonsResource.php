<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate;
use spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\HumanResources\LeavingReasons\CreateLeavingReasonRequest;
use spkm\IsamsApi\Requests\HumanResources\LeavingReasons\DeleteLeavingReasonRequest;
use spkm\IsamsApi\Requests\HumanResources\LeavingReasons\GetLeavingReasonsRequest;
use spkm\IsamsApi\Requests\HumanResources\LeavingReasons\UpdateLeavingReasonRequest;

class LeavingReasonsResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate|array<string, mixed>  $globalListItem
     */
    public function createLeavingReason(GlobalListItemForCreate|array $globalListItem): Response
    {
        return $this->connector->send(new CreateLeavingReasonRequest($globalListItem));
    }

    public function deleteLeavingReason(int $id): Response
    {
        return $this->connector->send(new DeleteLeavingReasonRequest($id));
    }

    public function getLeavingReasons(): Response
    {
        return $this->connector->send(new GetLeavingReasonsRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate|array<string, mixed>  $globalListItem
     */
    public function updateLeavingReason(int $id, GlobalListItemForUpdate|array $globalListItem): Response
    {
        return $this->connector->send(new UpdateLeavingReasonRequest($id, $globalListItem));
    }
}
