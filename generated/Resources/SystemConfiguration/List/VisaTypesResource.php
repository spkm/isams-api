<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration\List;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\SystemConfiguration\List\VisaTypes\CreateVisaTypeRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\VisaTypes\DeleteVisaTypeRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\VisaTypes\GetVisaTypesRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\VisaTypes\UpdateVisaTypeRequest;

class VisaTypesResource extends BaseResource
{
    public function all(): Response
    {
        return $this->connector->send(new GetVisaTypesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate|array<string, mixed>  $listItem
     */
    public function create(GlobalListItemForCreate|array $listItem): Response
    {
        return $this->connector->send(new CreateVisaTypeRequest($listItem));
    }

    public function delete(int $id): Response
    {
        return $this->connector->send(new DeleteVisaTypeRequest($id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate|array<string, mixed>  $listItem
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): Response
    {
        return $this->connector->send(new UpdateVisaTypeRequest($id, $listItem));
    }
}
