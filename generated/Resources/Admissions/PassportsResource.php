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
    /**
     * @param  \spkm\IsamsApi\Data\Admissions\ApplicantPassportForCreate|array<string, mixed>  $passport
     */
    public function createApplicantPassport(string $schoolId, ApplicantPassportForCreate|array $passport): Response
    {
        return $this->connector->send(new CreateApplicantPassportRequest($schoolId, $passport));
    }

    public function deleteApplicantPassport(string $schoolId, int $id): Response
    {
        return $this->connector->send(new DeleteApplicantPassportRequest($schoolId, $id));
    }

    public function getApplicantPassport(string $schoolId, int $id, ?string $expand = null): Response
    {
        return $this->connector->send(new GetApplicantPassportRequest($schoolId, $id, $expand));
    }

    public function getApplicantPassports(string $schoolId, ?string $expand = null): Response
    {
        return $this->connector->send(new GetApplicantPassportsRequest($schoolId, $expand));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\ApplicantPassportForUpdate|array<string, mixed>  $passport
     */
    public function updateApplicantPassport(
        string $schoolId,
        int $id,
        ApplicantPassportForUpdate|array $passport,
    ): Response {
        return $this->connector->send(new UpdateApplicantPassportRequest($schoolId, $id, $passport));
    }

    /**
     * @param  list<\spkm\IsamsApi\Data\Admissions\ApplicantPassportForUpdate|array<string, mixed>>  $passports
     */
    public function updateApplicantPassports(string $schoolId, array $passports): Response
    {
        return $this->connector->send(new UpdateApplicantPassportsRequest($schoolId, $passports));
    }
}
