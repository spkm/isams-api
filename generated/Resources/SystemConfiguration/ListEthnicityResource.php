<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Ethnicity\CreateEthnicityRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Ethnicity\DeleteEthnicityRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Ethnicity\GetEthnicitiesRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Ethnicity\UpdateEthnicityRequest;

class ListEthnicityResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate|array<string, mixed>  $globalListItem
     */
    public function createEthnicity(GlobalListItemForCreate|array $globalListItem): Response
    {
        return $this->connector->send(new CreateEthnicityRequest($globalListItem));
    }

    public function deleteEthnicity(int $id): Response
    {
        return $this->connector->send(new DeleteEthnicityRequest($id));
    }

    public function getEthnicities(): Response
    {
        return $this->connector->send(new GetEthnicitiesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate|array<string, mixed>  $globalListItem
     */
    public function updateEthnicity(int $id, GlobalListItemForUpdate|array $globalListItem): Response
    {
        return $this->connector->send(new UpdateEthnicityRequest($id, $globalListItem));
    }
}
