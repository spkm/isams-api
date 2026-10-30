<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Admissions;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Admissions\GlobalListItemForCreate;
use spkm\IsamsApi\Data\Admissions\GlobalListItemForUpdate;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Requests\Admissions\EnquiryTypes\CreateEnquiryTypeRequest;
use spkm\IsamsApi\Requests\Admissions\EnquiryTypes\DeleteEnquiryTypeRequest;
use spkm\IsamsApi\Requests\Admissions\EnquiryTypes\GetEnquiryTypesRequest;
use spkm\IsamsApi\Requests\Admissions\EnquiryTypes\UpdateEnquiryTypeRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class EnquiryTypesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Admissions\GlobalListItem>
     * @see \spkm\IsamsApi\Requests\Admissions\EnquiryTypes\GetEnquiryTypesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetEnquiryTypesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\GlobalListItemForCreate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\Admissions\EnquiryTypes\CreateEnquiryTypeRequest
     */
    public function create(GlobalListItemForCreate|array $listItem): Created
    {
        return $this->fetch(new CreateEnquiryTypeRequest(listItem: $listItem));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Admissions\EnquiryTypes\DeleteEnquiryTypeRequest
     */
    public function delete(int $id): bool
    {
        $this->fetch(new DeleteEnquiryTypeRequest(id: $id));

        return true;
    }

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\GlobalListItemForUpdate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\Admissions\EnquiryTypes\UpdateEnquiryTypeRequest
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): bool
    {
        $this->fetch(new UpdateEnquiryTypeRequest(id: $id, listItem: $listItem));

        return true;
    }
}
