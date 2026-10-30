<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Admissions;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Stringable;
use spkm\IsamsApi\Requests\Admissions\Contacts\GetApplicantContactsRequest;
use spkm\IsamsApi\Requests\Admissions\Contacts\GetApplicantStudentContactsRequest;
use spkm\IsamsApi\Requests\Admissions\Contacts\GetApplicantsContactsRequest;

class ContactsResource extends BaseResource
{
    public function all(?int $page = null, ?int $pageSize = null, string|Stringable|null $filter = null): Response
    {
        return $this->connector->send(new GetApplicantsContactsRequest($page, $pageSize, $filter));
    }

    public function forApplicant(
        string $schoolId,
        ?bool $includeDeceased = null,
        string|Stringable|null $filter = null,
    ): Response {
        return $this->connector->send(new GetApplicantContactsRequest($schoolId, $includeDeceased, $filter));
    }

    public function studentContacts(
        string $schoolId,
        ?bool $includeDeceased = null,
        string|Stringable|null $filter = null,
    ): Response {
        return $this->connector->send(new GetApplicantStudentContactsRequest($schoolId, $includeDeceased, $filter));
    }
}
