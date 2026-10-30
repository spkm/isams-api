<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Students;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Stringable;
use spkm\IsamsApi\Requests\Students\Contacts\GetAllStudentContactsRequest;
use spkm\IsamsApi\Requests\Students\Contacts\GetStudentContactsRequest;

class ContactsResource extends BaseResource
{
    public function all(
        ?int $page = null,
        ?int $pageSize = null,
        ?string $expand = null,
        string|Stringable|null $filter = null,
    ): Response {
        return $this->connector->send(new GetAllStudentContactsRequest($page, $pageSize, $expand, $filter));
    }

    public function forStudent(
        string $schoolId,
        ?bool $includeDeceased = null,
        ?string $expand = null,
        string|Stringable|null $filter = null,
    ): Response {
        return $this->connector->send(new GetStudentContactsRequest($schoolId, $includeDeceased, $expand, $filter));
    }
}
