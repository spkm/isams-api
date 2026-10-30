<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration\List;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\SystemConfiguration\List\PassportType\CreatePassportTypeRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\PassportType\DeletePassportTypeRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\PassportType\GetPassportTypesRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\PassportType\UpdatePassportTypeRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class PassportTypeResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItem>
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\PassportType\GetPassportTypesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetPassportTypesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\PassportType\CreatePassportTypeRequest
     */
    public function create(GlobalListItemForCreate|array $listItem): Created
    {
        return $this->fetch(new CreatePassportTypeRequest(listItem: $listItem));
    }

    /**
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\PassportType\DeletePassportTypeRequest
     */
    public function delete(int $id): void
    {
        $this->fetch(new DeletePassportTypeRequest(id: $id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\PassportType\UpdatePassportTypeRequest
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): void
    {
        $this->fetch(new UpdatePassportTypeRequest(id: $id, listItem: $listItem));
    }
}
