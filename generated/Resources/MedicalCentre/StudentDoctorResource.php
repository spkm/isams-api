<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\MedicalCentre;

use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\MedicalCentre\PersonDoctorAndSurgery;
use spkm\IsamsApi\Data\MedicalCentre\PersonDoctorAndSurgeryForCreate;
use spkm\IsamsApi\Requests\MedicalCentre\StudentDoctor\CreateStudentDoctorRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentDoctor\DeleteStudentDoctorRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentDoctor\GetStudentDoctorRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentDoctor\PatchStudentDoctorRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class StudentDoctorResource extends IsamsResource
{
    /**
     * @param  \spkm\IsamsApi\Data\MedicalCentre\PersonDoctorAndSurgeryForCreate|array<string, mixed>  $personDoctorAndSurgery
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentDoctor\CreateStudentDoctorRequest
     */
    public function create(string $schoolId, PersonDoctorAndSurgeryForCreate|array $personDoctorAndSurgery): Created
    {
        return $this->fetch(new CreateStudentDoctorRequest(schoolId: $schoolId, personDoctorAndSurgery: $personDoctorAndSurgery));
    }

    /**
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentDoctor\DeleteStudentDoctorRequest
     */
    public function delete(string $schoolId): void
    {
        $this->fetch(new DeleteStudentDoctorRequest(schoolId: $schoolId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentDoctor\GetStudentDoctorRequest
     */
    public function get(string $schoolId): PersonDoctorAndSurgery
    {
        return $this->fetch(new GetStudentDoctorRequest(schoolId: $schoolId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentDoctor\PatchStudentDoctorRequest
     */
    public function patch(string $schoolId, JsonPatch|array $patch): void
    {
        $this->fetch(new PatchStudentDoctorRequest(schoolId: $schoolId, patch: $patch));
    }
}
