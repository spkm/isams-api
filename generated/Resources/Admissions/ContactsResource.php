<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Admissions;

use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;
use Stringable;
use spkm\IsamsApi\Data\Admissions\ApplicantsContact;
use spkm\IsamsApi\Requests\Admissions\Contacts\GetApplicantContactsRequest;
use spkm\IsamsApi\Requests\Admissions\Contacts\GetApplicantStudentContactsRequest;
use spkm\IsamsApi\Requests\Admissions\Contacts\GetApplicantsContactsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class ContactsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\LazyCollection<int, \spkm\IsamsApi\Data\Admissions\ApplicantsContact>
     * @see \spkm\IsamsApi\Requests\Admissions\Contacts\GetApplicantsContactsRequest
     */
    public function all(string|Stringable|null $filter = null): LazyCollection
    {
        return $this->each(new GetApplicantsContactsRequest(filter: $filter), ApplicantsContact::class);
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Admissions\Contact>
     * @see \spkm\IsamsApi\Requests\Admissions\Contacts\GetApplicantContactsRequest
     */
    public function forApplicant(
        string $schoolId,
        ?bool $includeDeceased = null,
        string|Stringable|null $filter = null,
    ): Collection {
        return $this->fetch(new GetApplicantContactsRequest(schoolId: $schoolId, includeDeceased: $includeDeceased, filter: $filter));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Admissions\Contact>
     * @see \spkm\IsamsApi\Requests\Admissions\Contacts\GetApplicantStudentContactsRequest
     */
    public function studentContacts(
        string $schoolId,
        ?bool $includeDeceased = null,
        string|Stringable|null $filter = null,
    ): Collection {
        return $this->fetch(new GetApplicantStudentContactsRequest(schoolId: $schoolId, includeDeceased: $includeDeceased, filter: $filter));
    }
}
