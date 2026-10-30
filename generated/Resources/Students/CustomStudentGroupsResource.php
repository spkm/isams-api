<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Students;

use Illuminate\Support\Collection;
use Stringable;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\Students\CustomStudentGroup;
use spkm\IsamsApi\Data\Students\CustomStudentGroupForCreate;
use spkm\IsamsApi\Data\Students\CustomStudentGroupForUpdate;
use spkm\IsamsApi\Requests\Students\CustomStudentGroups\CreateCustomStudentGroupRequest;
use spkm\IsamsApi\Requests\Students\CustomStudentGroups\DeleteCustomStudentGroupRequest;
use spkm\IsamsApi\Requests\Students\CustomStudentGroups\GetCustomStudentGroupRequest;
use spkm\IsamsApi\Requests\Students\CustomStudentGroups\GetCustomStudentGroupsRequest;
use spkm\IsamsApi\Requests\Students\CustomStudentGroups\UpdateCustomStudentGroupRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class CustomStudentGroupsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\CustomStudentGroup>
     * @see \spkm\IsamsApi\Requests\Students\CustomStudentGroups\GetCustomStudentGroupsRequest
     */
    public function all(string|Stringable|null $filter = null): Collection
    {
        return $this->fetch(new GetCustomStudentGroupsRequest(filter: $filter));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Students\CustomStudentGroupForCreate|array<string, mixed>  $customStudentGroup
     * @see \spkm\IsamsApi\Requests\Students\CustomStudentGroups\CreateCustomStudentGroupRequest
     */
    public function create(CustomStudentGroupForCreate|array $customStudentGroup): Created
    {
        return $this->fetch(new CreateCustomStudentGroupRequest(customStudentGroup: $customStudentGroup));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Students\CustomStudentGroups\DeleteCustomStudentGroupRequest
     */
    public function delete(int $id): bool
    {
        $this->fetch(new DeleteCustomStudentGroupRequest(id: $id));

        return true;
    }

    /**
     * @see \spkm\IsamsApi\Requests\Students\CustomStudentGroups\GetCustomStudentGroupRequest
     */
    public function get(int $id): CustomStudentGroup
    {
        return $this->fetch(new GetCustomStudentGroupRequest(id: $id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Students\CustomStudentGroupForUpdate|array<string, mixed>  $customStudentGroup
     * @see \spkm\IsamsApi\Requests\Students\CustomStudentGroups\UpdateCustomStudentGroupRequest
     */
    public function update(int $id, CustomStudentGroupForUpdate|array $customStudentGroup): bool
    {
        $this->fetch(new UpdateCustomStudentGroupRequest(id: $id, customStudentGroup: $customStudentGroup));

        return true;
    }
}
