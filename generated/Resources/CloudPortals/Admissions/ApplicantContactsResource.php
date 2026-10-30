<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\Admissions;

use Illuminate\Support\Collection;
use Stringable;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\ApplicantContacts\GetApplicantContactsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class ApplicantContactsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Admissions\Contact>
     * @see \spkm\IsamsApi\Requests\CloudPortals\Admissions\ApplicantContacts\GetApplicantContactsRequest
     */
    public function all(
        string $schoolId,
        ?bool $includeDeceased = null,
        string|Stringable|null $filter = null,
    ): Collection {
        return $this->fetch(new GetApplicantContactsRequest(schoolId: $schoolId, includeDeceased: $includeDeceased, filter: $filter));
    }
}
