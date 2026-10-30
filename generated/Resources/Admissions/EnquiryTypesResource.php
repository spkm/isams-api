<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Admissions;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\Admissions\GlobalListItemForCreate;
use spkm\IsamsApi\Data\Admissions\GlobalListItemForUpdate;
use spkm\IsamsApi\Requests\Admissions\EnquiryTypes\CreateEnquiryTypeRequest;
use spkm\IsamsApi\Requests\Admissions\EnquiryTypes\DeleteEnquiryTypeRequest;
use spkm\IsamsApi\Requests\Admissions\EnquiryTypes\GetEnquiryTypesRequest;
use spkm\IsamsApi\Requests\Admissions\EnquiryTypes\UpdateEnquiryTypeRequest;

class EnquiryTypesResource extends BaseResource
{
    public function all(): Response
    {
        return $this->connector->send(new GetEnquiryTypesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\GlobalListItemForCreate|array<string, mixed>  $listItem
     */
    public function create(GlobalListItemForCreate|array $listItem): Response
    {
        return $this->connector->send(new CreateEnquiryTypeRequest($listItem));
    }

    public function delete(int $id): Response
    {
        return $this->connector->send(new DeleteEnquiryTypeRequest($id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\GlobalListItemForUpdate|array<string, mixed>  $listItem
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): Response
    {
        return $this->connector->send(new UpdateEnquiryTypeRequest($id, $listItem));
    }
}
