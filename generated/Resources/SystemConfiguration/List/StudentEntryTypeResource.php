<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration\List;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\SystemConfiguration\List\StudentEntryType\CreateStudentEntryTypeRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\StudentEntryType\DeleteStudentEntryTypeRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\StudentEntryType\GetStudentEntryTypesRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\StudentEntryType\UpdateStudentEntryTypeRequest;

class StudentEntryTypeResource extends BaseResource
{
    public function all(): Response
    {
        return $this->connector->send(new GetStudentEntryTypesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate|array<string, mixed>  $listItem
     */
    public function create(GlobalListItemForCreate|array $listItem): Response
    {
        return $this->connector->send(new CreateStudentEntryTypeRequest($listItem));
    }

    public function delete(int $id): Response
    {
        return $this->connector->send(new DeleteStudentEntryTypeRequest($id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate|array<string, mixed>  $listItem
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): Response
    {
        return $this->connector->send(new UpdateStudentEntryTypeRequest($id, $listItem));
    }
}
