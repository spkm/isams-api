<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\SystemConfiguration\List\StudentEntryType\CreateStudentEntryTypeRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\StudentEntryType\DeleteStudentEntryTypeRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\StudentEntryType\GetStudentEntryTypesRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\StudentEntryType\UpdateStudentEntryTypeRequest;

class ListStudentEntryTypeResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate|array<string, mixed>  $globalListItem
     */
    public function createStudentEntryType(GlobalListItemForCreate|array $globalListItem): Response
    {
        return $this->connector->send(new CreateStudentEntryTypeRequest($globalListItem));
    }

    public function deleteStudentEntryType(int $id): Response
    {
        return $this->connector->send(new DeleteStudentEntryTypeRequest($id));
    }

    public function getStudentEntryTypes(): Response
    {
        return $this->connector->send(new GetStudentEntryTypesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate|array<string, mixed>  $globalListItem
     */
    public function updateStudentEntryType(int $id, GlobalListItemForUpdate|array $globalListItem): Response
    {
        return $this->connector->send(new UpdateStudentEntryTypeRequest($id, $globalListItem));
    }
}
