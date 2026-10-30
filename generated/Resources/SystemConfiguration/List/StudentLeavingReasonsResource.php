<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration\List;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\SystemConfiguration\List\StudentLeavingReasons\CreateStudentLeavingReasonRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\StudentLeavingReasons\DeleteStudentLeavingReasonRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\StudentLeavingReasons\GetStudentLeavingReasonsRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\StudentLeavingReasons\UpdateStudentLeavingReasonRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class StudentLeavingReasonsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItem>
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\StudentLeavingReasons\GetStudentLeavingReasonsRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetStudentLeavingReasonsRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\StudentLeavingReasons\CreateStudentLeavingReasonRequest
     */
    public function create(GlobalListItemForCreate|array $listItem): Created
    {
        return $this->fetch(new CreateStudentLeavingReasonRequest(listItem: $listItem));
    }

    /**
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\StudentLeavingReasons\DeleteStudentLeavingReasonRequest
     */
    public function delete(int $id): void
    {
        $this->fetch(new DeleteStudentLeavingReasonRequest(id: $id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\List\StudentLeavingReasons\UpdateStudentLeavingReasonRequest
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): void
    {
        $this->fetch(new UpdateStudentLeavingReasonRequest(id: $id, listItem: $listItem));
    }
}
