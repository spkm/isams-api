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
    public function all(): Response
    {
        return $this->connector->send(new GetEnquiryReasonsRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\GlobalListItemForCreate|array<string, mixed>  $listItem
     */
    public function create(GlobalListItemForCreate|array $listItem): Response
    {
        return $this->connector->send(new CreateEnquiryReasonRequest($listItem));
    }

    public function delete(int $id): Response
    {
        return $this->connector->send(new DeleteEnquiryReasonRequest($id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\GlobalListItemForUpdate|array<string, mixed>  $listItem
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): Response
    {
        return $this->connector->send(new UpdateEnquiryReasonRequest($id, $listItem));
    }
}
