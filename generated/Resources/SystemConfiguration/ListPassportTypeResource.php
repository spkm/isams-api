<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\SystemConfiguration\List\PassportType\CreatePassportTypeRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\PassportType\DeletePassportTypeRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\PassportType\GetPassportTypesRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\PassportType\UpdatePassportTypeRequest;

class ListPassportTypeResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate|array<string, mixed>  $globalListItem
     */
    public function createPassportType(GlobalListItemForCreate|array $globalListItem): Response
    {
        return $this->connector->send(new CreatePassportTypeRequest($globalListItem));
    }

    public function deletePassportType(int $id): Response
    {
        return $this->connector->send(new DeletePassportTypeRequest($id));
    }

    public function getPassportTypes(): Response
    {
        return $this->connector->send(new GetPassportTypesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate|array<string, mixed>  $globalListItem
     */
    public function updatePassportType(int $id, GlobalListItemForUpdate|array $globalListItem): Response
    {
        return $this->connector->send(new UpdatePassportTypeRequest($id, $globalListItem));
    }
}
