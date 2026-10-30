<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration\List;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\SystemConfiguration\List\VisaTypes\CreateVisaTypeRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\VisaTypes\DeleteVisaTypeRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\VisaTypes\GetVisaTypesRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\VisaTypes\UpdateVisaTypeRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class VisaTypesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItem>
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\VisaTypes\GetVisaTypesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetVisaTypesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\VisaTypes\CreateVisaTypeRequest
     */
    public function create(GlobalListItemForCreate|array $listItem): Created
    {
        return $this->fetch(new CreateVisaTypeRequest(listItem: $listItem));
    }

    /**
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\VisaTypes\DeleteVisaTypeRequest
     */
    public function delete(int $id): bool
    {
        $this->fetch(new DeleteVisaTypeRequest(id: $id));

        return true;
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\VisaTypes\UpdateVisaTypeRequest
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): bool
    {
        $this->fetch(new UpdateVisaTypeRequest(id: $id, listItem: $listItem));

        return true;
    }
}
