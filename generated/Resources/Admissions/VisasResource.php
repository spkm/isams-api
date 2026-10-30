<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Admissions;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Admissions\ApplicantVisa;
use spkm\IsamsApi\Data\Admissions\ApplicantVisaForCreate;
use spkm\IsamsApi\Data\Admissions\ApplicantVisaForUpdate;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Requests\Admissions\Visas\CreateApplicantVisaRequest;
use spkm\IsamsApi\Requests\Admissions\Visas\DeleteApplicantVisaRequest;
use spkm\IsamsApi\Requests\Admissions\Visas\GetApplicantVisaRequest;
use spkm\IsamsApi\Requests\Admissions\Visas\GetApplicantVisasRequest;
use spkm\IsamsApi\Requests\Admissions\Visas\UpdateApplicantVisaRequest;
use spkm\IsamsApi\Requests\Admissions\Visas\UpdateApplicantVisasRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class VisasResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Admissions\ApplicantVisa>
     * @see \spkm\IsamsApi\Requests\Admissions\Visas\GetApplicantVisasRequest
     */
    public function all(string $schoolId, ?string $expand = null): Collection
    {
        return $this->fetch(new GetApplicantVisasRequest(schoolId: $schoolId, expand: $expand));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\ApplicantVisaForCreate|array<string, mixed>  $applicantVisa
     * @see \spkm\IsamsApi\Requests\Admissions\Visas\CreateApplicantVisaRequest
     */
    public function create(string $schoolId, ApplicantVisaForCreate|array $applicantVisa): Created
    {
        return $this->fetch(new CreateApplicantVisaRequest(schoolId: $schoolId, applicantVisa: $applicantVisa));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Admissions\Visas\DeleteApplicantVisaRequest
     */
    public function delete(string $schoolId, int $id): bool
    {
        $this->fetch(new DeleteApplicantVisaRequest(schoolId: $schoolId, id: $id));

        return true;
    }

    /**
     * @see \spkm\IsamsApi\Requests\Admissions\Visas\GetApplicantVisaRequest
     */
    public function get(string $schoolId, int $id, ?string $expand = null): ApplicantVisa
    {
        return $this->fetch(new GetApplicantVisaRequest(schoolId: $schoolId, id: $id, expand: $expand));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\ApplicantVisaForUpdate|array<string, mixed>  $applicantVisa
     * @see \spkm\IsamsApi\Requests\Admissions\Visas\UpdateApplicantVisaRequest
     */
    public function update(string $schoolId, int $id, ApplicantVisaForUpdate|array $applicantVisa): bool
    {
        $this->fetch(new UpdateApplicantVisaRequest(schoolId: $schoolId, id: $id, applicantVisa: $applicantVisa));

        return true;
    }

    /**
     * @param  list<\spkm\IsamsApi\Data\Admissions\ApplicantVisaForUpdate|array<string, mixed>>  $applicantVisas
     * @see \spkm\IsamsApi\Requests\Admissions\Visas\UpdateApplicantVisasRequest
     */
    public function updateMany(string $schoolId, array $applicantVisas): bool
    {
        $this->fetch(new UpdateApplicantVisasRequest(schoolId: $schoolId, applicantVisas: $applicantVisas));

        return true;
    }
}
