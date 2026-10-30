<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration\List;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\SystemConfiguration\List\PassportType\CreatePassportTypeRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\PassportType\DeletePassportTypeRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\PassportType\GetPassportTypesRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\PassportType\UpdatePassportTypeRequest;

class PassportTypeResource extends BaseResource
{
    public function all(): Response
    {
        return $this->connector->send(new GetPassportTypesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate|array<string, mixed>  $listItem
     */
    public function create(GlobalListItemForCreate|array $listItem): Response
    {
        return $this->connector->send(new CreatePassportTypeRequest($listItem));
    }

    public function delete(int $id): Response
    {
        return $this->connector->send(new DeletePassportTypeRequest($id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate|array<string, mixed>  $listItem
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): Response
    {
        return $this->connector->send(new UpdatePassportTypeRequest($id, $listItem));
    }
}
