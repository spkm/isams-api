<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Languages\CreateLanguageRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Languages\DeleteLanguageRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Languages\GetLanguagesRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\Languages\UpdateLanguageRequest;

class ListLanguagesResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate|array<string, mixed>  $globalListItem
     */
    public function createLanguage(GlobalListItemForCreate|array $globalListItem): Response
    {
        return $this->connector->send(new CreateLanguageRequest($globalListItem));
    }

    public function deleteLanguage(int $id): Response
    {
        return $this->connector->send(new DeleteLanguageRequest($id));
    }

    public function getLanguages(): Response
    {
        return $this->connector->send(new GetLanguagesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate|array<string, mixed>  $globalListItem
     */
    public function updateLanguage(int $id, GlobalListItemForUpdate|array $globalListItem): Response
    {
        return $this->connector->send(new UpdateLanguageRequest($id, $globalListItem));
    }
}
