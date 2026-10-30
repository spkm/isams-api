<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Admissions;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Admissions\GlobalListItemForCreate;
use spkm\IsamsApi\Data\Admissions\GlobalListItemForUpdate;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Requests\Admissions\EnquiryReasons\CreateEnquiryReasonRequest;
use spkm\IsamsApi\Requests\Admissions\EnquiryReasons\DeleteEnquiryReasonRequest;
use spkm\IsamsApi\Requests\Admissions\EnquiryReasons\GetEnquiryReasonsRequest;
use spkm\IsamsApi\Requests\Admissions\EnquiryReasons\UpdateEnquiryReasonRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class EnquiryReasonsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Admissions\GlobalListItem>
     * @see \spkm\IsamsApi\Requests\Admissions\EnquiryReasons\GetEnquiryReasonsRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetEnquiryReasonsRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\GlobalListItemForCreate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\Admissions\EnquiryReasons\CreateEnquiryReasonRequest
     */
    public function create(GlobalListItemForCreate|array $listItem): Created
    {
        return $this->fetch(new CreateEnquiryReasonRequest(listItem: $listItem));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Admissions\EnquiryReasons\DeleteEnquiryReasonRequest
     */
    public function delete(int $id): void
    {
        $this->fetch(new DeleteEnquiryReasonRequest(id: $id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\GlobalListItemForUpdate|array<string, mixed>  $listItem
     * @see \spkm\IsamsApi\Requests\Admissions\EnquiryReasons\UpdateEnquiryReasonRequest
     */
    public function update(int $id, GlobalListItemForUpdate|array $listItem): void
    {
        $this->fetch(new UpdateEnquiryReasonRequest(id: $id, listItem: $listItem));
    }
}
