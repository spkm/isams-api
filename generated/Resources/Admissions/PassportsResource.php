<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Admissions;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Admissions\ApplicantPassport;
use spkm\IsamsApi\Data\Admissions\ApplicantPassportForCreate;
use spkm\IsamsApi\Data\Admissions\ApplicantPassportForUpdate;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Requests\Admissions\Passports\CreateApplicantPassportRequest;
use spkm\IsamsApi\Requests\Admissions\Passports\DeleteApplicantPassportRequest;
use spkm\IsamsApi\Requests\Admissions\Passports\GetApplicantPassportRequest;
use spkm\IsamsApi\Requests\Admissions\Passports\GetApplicantPassportsRequest;
use spkm\IsamsApi\Requests\Admissions\Passports\UpdateApplicantPassportRequest;
use spkm\IsamsApi\Requests\Admissions\Passports\UpdateApplicantPassportsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class PassportsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Admissions\ApplicantPassport>
     * @see \spkm\IsamsApi\Requests\Admissions\Passports\GetApplicantPassportsRequest
     */
    public function all(string $schoolId, ?string $expand = null): Collection
    {
        return $this->fetch(new GetApplicantPassportsRequest(schoolId: $schoolId, expand: $expand));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\ApplicantPassportForCreate|array<string, mixed>  $applicantPassport
     * @see \spkm\IsamsApi\Requests\Admissions\Passports\CreateApplicantPassportRequest
     */
    public function create(string $schoolId, ApplicantPassportForCreate|array $applicantPassport): Created
    {
        return $this->fetch(new CreateApplicantPassportRequest(schoolId: $schoolId, applicantPassport: $applicantPassport));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Admissions\Passports\DeleteApplicantPassportRequest
     */
    public function delete(string $schoolId, int $id): void
    {
        $this->fetch(new DeleteApplicantPassportRequest(schoolId: $schoolId, id: $id));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Admissions\Passports\GetApplicantPassportRequest
     */
    public function get(string $schoolId, int $id, ?string $expand = null): ApplicantPassport
    {
        return $this->fetch(new GetApplicantPassportRequest(schoolId: $schoolId, id: $id, expand: $expand));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\ApplicantPassportForUpdate|array<string, mixed>  $applicantPassport
     * @see \spkm\IsamsApi\Requests\Admissions\Passports\UpdateApplicantPassportRequest
     */
    public function update(string $schoolId, int $id, ApplicantPassportForUpdate|array $applicantPassport): void
    {
        $this->fetch(new UpdateApplicantPassportRequest(schoolId: $schoolId, id: $id, applicantPassport: $applicantPassport));
    }

    /**
     * @param  list<\spkm\IsamsApi\Data\Admissions\ApplicantPassportForUpdate|array<string, mixed>>  $applicantPassports
     * @see \spkm\IsamsApi\Requests\Admissions\Passports\UpdateApplicantPassportsRequest
     */
    public function updateMany(string $schoolId, array $applicantPassports): void
    {
        $this->fetch(new UpdateApplicantPassportsRequest(schoolId: $schoolId, applicantPassports: $applicantPassports));
    }
}
