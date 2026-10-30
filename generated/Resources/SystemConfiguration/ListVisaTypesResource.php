<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\SystemConfiguration\List\VisaTypes\CreateVisaTypeRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\VisaTypes\DeleteVisaTypeRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\VisaTypes\GetVisaTypesRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\VisaTypes\UpdateVisaTypeRequest;

class ListVisaTypesResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate|array<string, mixed>  $globalListItem
     */
    public function createVisaType(GlobalListItemForCreate|array $globalListItem): Response
    {
        return $this->connector->send(new CreateVisaTypeRequest($globalListItem));
    }

    public function deleteVisaType(int $id): Response
    {
        return $this->connector->send(new DeleteVisaTypeRequest($id));
    }

    public function getVisaTypes(): Response
    {
        return $this->connector->send(new GetVisaTypesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate|array<string, mixed>  $globalListItem
     */
    public function updateVisaType(int $id, GlobalListItemForUpdate|array $globalListItem): Response
    {
        return $this->connector->send(new UpdateVisaTypeRequest($id, $globalListItem));
    }
}
