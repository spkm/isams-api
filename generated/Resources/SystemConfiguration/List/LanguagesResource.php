<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration\List;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Languages\CreateLanguageRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Languages\DeleteLanguageRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Languages\GetLanguagesRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Languages\UpdateLanguageRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class LanguagesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemWithCensusData>
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\Languages\GetLanguagesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetLanguagesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\Languages\CreateLanguageRequest
     */
    public function create(GlobalListItemForCreate|array $listItem): Created
    {
        return $this->fetch(new CreateLanguageRequest(listItem: $listItem));
    }

    /**
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\Languages\DeleteLanguageRequest
     */
    public function delete(int $id): void
    {
        $this->fetch(new DeleteLanguageRequest(id: $id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\Languages\UpdateLanguageRequest
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): void
    {
        $this->fetch(new UpdateLanguageRequest(id: $id, listItem: $listItem));
    }
}
