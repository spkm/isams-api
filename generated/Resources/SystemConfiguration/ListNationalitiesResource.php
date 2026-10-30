<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Nationalities\CreateNationalityRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Nationalities\DeleteNationalityRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Nationalities\GetNationalitiesRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Nationalities\UpdateNationalityRequest;

class ListNationalitiesResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate|array<string, mixed>  $globalListItem
     */
    public function createNationality(GlobalListItemForCreate|array $globalListItem): Response
    {
        return $this->connector->send(new CreateNationalityRequest($globalListItem));
    }

    public function deleteNationality(int $id): Response
    {
        return $this->connector->send(new DeleteNationalityRequest($id));
    }

    public function getNationalities(): Response
    {
        return $this->connector->send(new GetNationalitiesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate|array<string, mixed>  $globalListItem
     */
    public function updateNationality(int $id, GlobalListItemForUpdate|array $globalListItem): Response
    {
        return $this->connector->send(new UpdateNationalityRequest($id, $globalListItem));
    }
}
