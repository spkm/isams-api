<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Admissions;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\Admissions\GlobalListItemForCreate;
use spkm\IsamsApi\Data\Admissions\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\Admissions\EnquiryReasons\CreateEnquiryReasonRequest;
use spkm\IsamsApi\Requests\Admissions\EnquiryReasons\DeleteEnquiryReasonRequest;
use spkm\IsamsApi\Requests\Admissions\EnquiryReasons\GetEnquiryReasonsRequest;
use spkm\IsamsApi\Requests\Admissions\EnquiryReasons\UpdateEnquiryReasonRequest;

class EnquiryReasonsResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\Admissions\GlobalListItemForCreate|array<string, mixed>  $globalListItem
     */
    public function createEnquiryReason(GlobalListItemForCreate|array $globalListItem): Response
    {
        return $this->connector->send(new CreateEnquiryReasonRequest($globalListItem));
    }

    public function deleteEnquiryReason(int $id): Response
    {
        return $this->connector->send(new DeleteEnquiryReasonRequest($id));
    }

    public function getEnquiryReasons(): Response
    {
        return $this->connector->send(new GetEnquiryReasonsRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\GlobalListItemForUpdate|array<string, mixed>  $globalListItem
     */
    public function updateEnquiryReason(int $id, GlobalListItemForUpdate|array $globalListItem): Response
    {
        return $this->connector->send(new UpdateEnquiryReasonRequest($id, $globalListItem));
    }
}
