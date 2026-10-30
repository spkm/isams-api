<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\Admissions;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Stringable;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\ApplicantContacts\GetApplicantContactsRequest;

class ApplicantContactsResource extends BaseResource
{
    public function all(
        string $schoolId,
        ?bool $includeDeceased = null,
        string|Stringable|null $filter = null,
    ): Response {
        return $this->connector->send(new GetApplicantContactsRequest($schoolId, $includeDeceased, $filter));
    }
}
