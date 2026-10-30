<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\MedicalCentre;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\MedicalCentre\PersonDoctorAndSurgeryForCreate;
use spkm\IsamsApi\Requests\MedicalCentre\StudentDoctor\CreateStudentDoctorRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentDoctor\DeleteStudentDoctorRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentDoctor\GetStudentDoctorRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentDoctor\PatchStudentDoctorRequest;
use spkm\IsamsApi\Support\JsonPatch;

class StudentDoctorResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\MedicalCentre\PersonDoctorAndSurgeryForCreate|array<string, mixed>  $personDoctorAndSurgery
     */
    public function createStudentDoctor(
        string $schoolId,
        PersonDoctorAndSurgeryForCreate|array $personDoctorAndSurgery,
    ): Response {
        return $this->connector->send(new CreateStudentDoctorRequest($schoolId, $personDoctorAndSurgery));
    }

    public function deleteStudentDoctor(string $schoolId): Response
    {
        return $this->connector->send(new DeleteStudentDoctorRequest($schoolId));
    }

    public function getStudentDoctor(string $schoolId): Response
    {
        return $this->connector->send(new GetStudentDoctorRequest($schoolId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patchStudentDoctor(string $schoolId, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchStudentDoctorRequest($schoolId, $patch));
    }
}
