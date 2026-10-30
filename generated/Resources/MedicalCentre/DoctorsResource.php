<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\MedicalCentre;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\MedicalCentre\Doctor;
use spkm\IsamsApi\Data\MedicalCentre\DoctorForCreate;
use spkm\IsamsApi\Requests\MedicalCentre\Doctors\CreateMedicalDoctorRequest;
use spkm\IsamsApi\Requests\MedicalCentre\Doctors\DeleteMedicalDoctorRequest;
use spkm\IsamsApi\Requests\MedicalCentre\Doctors\GetMedicalDoctorRequest;
use spkm\IsamsApi\Requests\MedicalCentre\Doctors\GetMedicalDoctorsRequest;
use spkm\IsamsApi\Requests\MedicalCentre\Doctors\PatchMedicalDoctorRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class DoctorsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\MedicalCentre\Doctor>
     * @see \spkm\IsamsApi\Requests\MedicalCentre\Doctors\GetMedicalDoctorsRequest
     */
    public function all(int $surgeryId): Collection
    {
        return $this->fetch(new GetMedicalDoctorsRequest(surgeryId: $surgeryId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\MedicalCentre\DoctorForCreate|array<string, mixed>  $doctor
     * @see \spkm\IsamsApi\Requests\MedicalCentre\Doctors\CreateMedicalDoctorRequest
     */
    public function create(int $surgeryId, DoctorForCreate|array $doctor): Created
    {
        return $this->fetch(new CreateMedicalDoctorRequest(surgeryId: $surgeryId, doctor: $doctor));
    }

    /**
     * @see \spkm\IsamsApi\Requests\MedicalCentre\Doctors\DeleteMedicalDoctorRequest
     */
    public function delete(string $surgeryId, int $doctorId): bool
    {
        $this->fetch(new DeleteMedicalDoctorRequest(surgeryId: $surgeryId, doctorId: $doctorId));

        return true;
    }

    /**
     * @see \spkm\IsamsApi\Requests\MedicalCentre\Doctors\GetMedicalDoctorRequest
     */
    public function get(string $surgeryId, int $doctorId): Doctor
    {
        return $this->fetch(new GetMedicalDoctorRequest(surgeryId: $surgeryId, doctorId: $doctorId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\MedicalCentre\Doctors\PatchMedicalDoctorRequest
     */
    public function patch(string $surgeryId, int $doctorId, JsonPatch|array $patch): bool
    {
        $this->fetch(new PatchMedicalDoctorRequest(surgeryId: $surgeryId, doctorId: $doctorId, patch: $patch));

        return true;
    }
}
