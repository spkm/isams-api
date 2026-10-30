<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Students;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Stringable;
use spkm\IsamsApi\Data\Students\CustomStudentGroupForCreate;
use spkm\IsamsApi\Data\Students\CustomStudentGroupForUpdate;
use spkm\IsamsApi\Requests\Students\CustomStudentGroups\CreateCustomStudentGroupRequest;
use spkm\IsamsApi\Requests\Students\CustomStudentGroups\DeleteCustomStudentGroupRequest;
use spkm\IsamsApi\Requests\Students\CustomStudentGroups\GetCustomStudentGroupRequest;
use spkm\IsamsApi\Requests\Students\CustomStudentGroups\GetCustomStudentGroupsRequest;
use spkm\IsamsApi\Requests\Students\CustomStudentGroups\UpdateCustomStudentGroupRequest;

class CustomStudentGroupsResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\Students\CustomStudentGroupForCreate|array<string, mixed>  $customStudentGroup
     */
    public function createCustomStudentGroup(CustomStudentGroupForCreate|array $customStudentGroup): Response
    {
        return $this->connector->send(new CreateCustomStudentGroupRequest($customStudentGroup));
    }

    public function deleteCustomStudentGroup(int $id): Response
    {
        return $this->connector->send(new DeleteCustomStudentGroupRequest($id));
    }

    public function getCustomStudentGroup(int $id): Response
    {
        return $this->connector->send(new GetCustomStudentGroupRequest($id));
    }

    public function getCustomStudentGroups(string|Stringable|null $filter = null): Response
    {
        return $this->connector->send(new GetCustomStudentGroupsRequest($filter));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Students\CustomStudentGroupForUpdate|array<string, mixed>  $customStudentGroup
     */
    public function updateCustomStudentGroup(int $id, CustomStudentGroupForUpdate|array $customStudentGroup): Response
    {
        return $this->connector->send(new UpdateCustomStudentGroupRequest($id, $customStudentGroup));
    }
}
