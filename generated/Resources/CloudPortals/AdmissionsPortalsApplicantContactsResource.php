<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Stringable;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\PortalsApplicantContacts\GetPortalsApplicantContactsRequest;

class AdmissionsPortalsApplicantContactsResource extends BaseResource
{
    public function getPortalsApplicantContacts(
        string $schoolId,
        ?bool $includeDeceased = null,
        string|Stringable|null $filter = null,
    ): Response {
        return $this->connector->send(new GetPortalsApplicantContactsRequest($schoolId, $includeDeceased, $filter));
    }
}
