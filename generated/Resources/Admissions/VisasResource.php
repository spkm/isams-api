<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Admissions;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\Admissions\ApplicantVisaForCreate;
use spkm\IsamsApi\Data\Admissions\ApplicantVisaForUpdate;
use spkm\IsamsApi\Requests\Admissions\Visas\CreateApplicantVisaRequest;
use spkm\IsamsApi\Requests\Admissions\Visas\DeleteApplicantVisaRequest;
use spkm\IsamsApi\Requests\Admissions\Visas\GetApplicantVisaRequest;
use spkm\IsamsApi\Requests\Admissions\Visas\GetApplicantVisasRequest;
use spkm\IsamsApi\Requests\Admissions\Visas\UpdateApplicantVisaRequest;
use spkm\IsamsApi\Requests\Admissions\Visas\UpdateApplicantVisasRequest;

class VisasResource extends BaseResource
{
    public function all(string $schoolId, ?string $expand = null): Response
    {
        return $this->connector->send(new GetApplicantVisasRequest($schoolId, $expand));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\ApplicantVisaForCreate|array<string, mixed>  $applicantVisa
     */
    public function create(string $schoolId, ApplicantVisaForCreate|array $applicantVisa): Response
    {
        return $this->connector->send(new CreateApplicantVisaRequest($schoolId, $applicantVisa));
    }

    public function delete(string $schoolId, int $id): Response
    {
        return $this->connector->send(new DeleteApplicantVisaRequest($schoolId, $id));
    }

    public function get(string $schoolId, int $id, ?string $expand = null): Response
    {
        return $this->connector->send(new GetApplicantVisaRequest($schoolId, $id, $expand));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\ApplicantVisaForUpdate|array<string, mixed>  $applicantVisa
     */
    public function update(string $schoolId, int $id, ApplicantVisaForUpdate|array $applicantVisa): Response
    {
        return $this->connector->send(new UpdateApplicantVisaRequest($schoolId, $id, $applicantVisa));
    }

    /**
     * @param  list<\spkm\IsamsApi\Data\Admissions\ApplicantVisaForUpdate|array<string, mixed>>  $applicantVisas
     */
    public function updateMany(string $schoolId, array $applicantVisas): Response
    {
        return $this->connector->send(new UpdateApplicantVisasRequest($schoolId, $applicantVisas));
    }
}
