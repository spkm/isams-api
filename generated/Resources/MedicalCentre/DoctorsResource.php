<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\MedicalCentre;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\MedicalCentre\DoctorForCreate;
use spkm\IsamsApi\Requests\MedicalCentre\Doctors\CreateMedicalDoctorRequest;
use spkm\IsamsApi\Requests\MedicalCentre\Doctors\DeleteMedicalDoctorRequest;
use spkm\IsamsApi\Requests\MedicalCentre\Doctors\GetMedicalDoctorRequest;
use spkm\IsamsApi\Requests\MedicalCentre\Doctors\GetMedicalDoctorsRequest;
use spkm\IsamsApi\Requests\MedicalCentre\Doctors\PatchMedicalDoctorRequest;
use spkm\IsamsApi\Support\JsonPatch;

class DoctorsResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\MedicalCentre\DoctorForCreate|array<string, mixed>  $doctor
     */
    public function createMedicalDoctor(int $surgeryId, DoctorForCreate|array $doctor): Response
    {
        return $this->connector->send(new CreateMedicalDoctorRequest($surgeryId, $doctor));
    }

    public function deleteMedicalDoctor(int $doctorId, string $surgeryId): Response
    {
        return $this->connector->send(new DeleteMedicalDoctorRequest($doctorId, $surgeryId));
    }

    public function getMedicalDoctor(int $doctorId, string $surgeryId): Response
    {
        return $this->connector->send(new GetMedicalDoctorRequest($doctorId, $surgeryId));
    }

    public function getMedicalDoctors(int $surgeryId): Response
    {
        return $this->connector->send(new GetMedicalDoctorsRequest($surgeryId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patchMedicalDoctor(int $doctorId, string $surgeryId, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchMedicalDoctorRequest($doctorId, $surgeryId, $patch));
    }
}
