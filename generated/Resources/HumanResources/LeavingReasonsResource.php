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
    public function all(): Response
    {
        return $this->connector->send(new GetLeavingReasonsRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForCreate|array<string, mixed>  $listItem
     */
    public function create(GlobalListItemForCreate|array $listItem): Response
    {
        return $this->connector->send(new CreateLeavingReasonRequest($listItem));
    }

    public function delete(int $id): Response
    {
        return $this->connector->send(new DeleteLeavingReasonRequest($id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\GlobalListItemForUpdate|array<string, mixed>  $listItem
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): Response
    {
        return $this->connector->send(new UpdateLeavingReasonRequest($id, $listItem));
    }
}
