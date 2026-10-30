<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\SystemConfiguration\List\StudentLeavingReasons\CreateStudentLeavingReasonRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\StudentLeavingReasons\DeleteStudentLeavingReasonRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\StudentLeavingReasons\GetStudentLeavingReasonsRequest;
use spkm\IsamsApi\Requests\SystemConfiguration\List\StudentLeavingReasons\UpdateStudentLeavingReasonRequest;

class ListStudentLeavingReasonsResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForCreate|array<string, mixed>  $globalListItem
     */
    public function createStudentLeavingReason(GlobalListItemForCreate|array $globalListItem): Response
    {
        return $this->connector->send(new CreateStudentLeavingReasonRequest($globalListItem));
    }

    public function deleteStudentLeavingReason(int $id): Response
    {
        return $this->connector->send(new DeleteStudentLeavingReasonRequest($id));
    }

    public function getStudentLeavingReasons(): Response
    {
        return $this->connector->send(new GetStudentLeavingReasonsRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemForUpdate|array<string, mixed>  $globalListItem
     */
    public function updateStudentLeavingReason(int $id, GlobalListItemForUpdate|array $globalListItem): Response
    {
        return $this->connector->send(new UpdateStudentLeavingReasonRequest($id, $globalListItem));
    }
}
