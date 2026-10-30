<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Admissions;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\Admissions\ApplicantPassportForCreate;
use spkm\IsamsApi\Data\Admissions\ApplicantPassportForUpdate;
use spkm\IsamsApi\Requests\Admissions\Passports\CreateApplicantPassportRequest;
use spkm\IsamsApi\Requests\Admissions\Passports\DeleteApplicantPassportRequest;
use spkm\IsamsApi\Requests\Admissions\Passports\GetApplicantPassportRequest;
use spkm\IsamsApi\Requests\Admissions\Passports\GetApplicantPassportsRequest;
use spkm\IsamsApi\Requests\Admissions\Passports\UpdateApplicantPassportRequest;
use spkm\IsamsApi\Requests\Admissions\Passports\UpdateApplicantPassportsRequest;

class PassportsResource extends BaseResource
{
    public function all(string $schoolId, ?string $expand = null): Response
    {
        return $this->connector->send(new GetApplicantPassportsRequest($schoolId, $expand));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\ApplicantPassportForCreate|array<string, mixed>  $applicantPassport
     */
    public function create(string $schoolId, ApplicantPassportForCreate|array $applicantPassport): Response
    {
        return $this->connector->send(new CreateApplicantPassportRequest($schoolId, $applicantPassport));
    }

    public function delete(string $schoolId, int $id): Response
    {
        return $this->connector->send(new DeleteApplicantPassportRequest($schoolId, $id));
    }

    public function get(string $schoolId, int $id, ?string $expand = null): Response
    {
        return $this->connector->send(new GetApplicantPassportRequest($schoolId, $id, $expand));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\ApplicantPassportForUpdate|array<string, mixed>  $applicantPassport
     */
    public function update(string $schoolId, int $id, ApplicantPassportForUpdate|array $applicantPassport): Response
    {
        return $this->connector->send(new UpdateApplicantPassportRequest($schoolId, $id, $applicantPassport));
    }

    /**
     * @param  list<\spkm\IsamsApi\Data\Admissions\ApplicantPassportForUpdate|array<string, mixed>>  $applicantPassports
     */
    public function updateMany(string $schoolId, array $applicantPassports): Response
    {
        return $this->connector->send(new UpdateApplicantPassportsRequest($schoolId, $applicantPassports));
    }
}
