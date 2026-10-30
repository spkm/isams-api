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
    /**
     * @param  \spkm\IsamsApi\Data\Admissions\ApplicantVisaForCreate|array<string, mixed>  $visa
     */
    public function createApplicantVisa(string $schoolId, ApplicantVisaForCreate|array $visa): Response
    {
        return $this->connector->send(new CreateApplicantVisaRequest($schoolId, $visa));
    }

    public function deleteApplicantVisa(string $schoolId, int $id): Response
    {
        return $this->connector->send(new DeleteApplicantVisaRequest($schoolId, $id));
    }

    public function getApplicantVisa(string $schoolId, int $id, ?string $expand = null): Response
    {
        return $this->connector->send(new GetApplicantVisaRequest($schoolId, $id, $expand));
    }

    public function getApplicantVisas(string $schoolId, ?string $expand = null): Response
    {
        return $this->connector->send(new GetApplicantVisasRequest($schoolId, $expand));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\ApplicantVisaForUpdate|array<string, mixed>  $visa
     */
    public function updateApplicantVisa(string $schoolId, int $id, ApplicantVisaForUpdate|array $visa): Response
    {
        return $this->connector->send(new UpdateApplicantVisaRequest($schoolId, $id, $visa));
    }

    /**
     * @param  list<\spkm\IsamsApi\Data\Admissions\ApplicantVisaForUpdate|array<string, mixed>>  $visas
     */
    public function updateApplicantVisas(string $schoolId, array $visas): Response
    {
        return $this->connector->send(new UpdateApplicantVisasRequest($schoolId, $visas));
    }
}
