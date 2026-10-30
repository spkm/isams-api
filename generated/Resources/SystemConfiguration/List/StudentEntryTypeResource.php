<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration\List;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\SystemConfiguration\List\StudentEntryType\CreateStudentEntryTypeRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\StudentEntryType\DeleteStudentEntryTypeRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\StudentEntryType\GetStudentEntryTypesRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\StudentEntryType\UpdateStudentEntryTypeRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class StudentEntryTypeResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItem>
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\StudentEntryType\GetStudentEntryTypesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetStudentEntryTypesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\StudentEntryType\CreateStudentEntryTypeRequest
     */
    public function create(GlobalListItemForCreate|array $listItem): Created
    {
        return $this->fetch(new CreateStudentEntryTypeRequest(listItem: $listItem));
    }

    /**
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\StudentEntryType\DeleteStudentEntryTypeRequest
     */
    public function delete(int $id): bool
    {
        $this->fetch(new DeleteStudentEntryTypeRequest(id: $id));

        return true;
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\StudentEntryType\UpdateStudentEntryTypeRequest
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): bool
    {
        $this->fetch(new UpdateStudentEntryTypeRequest(id: $id, listItem: $listItem));

        return true;
    }
}
