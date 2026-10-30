<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Students;

use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;
use Stringable;
use spkm\IsamsApi\Data\Students\StudentsContact;
use spkm\IsamsApi\Requests\Students\Contacts\GetAllStudentContactsRequest;
use spkm\IsamsApi\Requests\Students\Contacts\GetStudentContactsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class ContactsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\LazyCollection<int, \spkm\IsamsApi\Data\Students\StudentsContact>
     * @see \spkm\IsamsApi\Requests\Students\Contacts\GetAllStudentContactsRequest
     */
    public function all(?string $expand = null, string|Stringable|null $filter = null): LazyCollection
    {
        return $this->each(new GetAllStudentContactsRequest(expand: $expand, filter: $filter), StudentsContact::class);
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Students\StudentContact>
     * @see \spkm\IsamsApi\Requests\Students\Contacts\GetStudentContactsRequest
     */
    public function forStudent(
        string $schoolId,
        ?bool $includeDeceased = null,
        ?string $expand = null,
        string|Stringable|null $filter = null,
    ): Collection {
        return $this->fetch(new GetStudentContactsRequest(schoolId: $schoolId, includeDeceased: $includeDeceased, expand: $expand, filter: $filter));
    }
}
