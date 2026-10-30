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
    public function all(int $surgeryId): Response
    {
        return $this->connector->send(new GetMedicalDoctorsRequest($surgeryId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\MedicalCentre\DoctorForCreate|array<string, mixed>  $doctor
     */
    public function create(int $surgeryId, DoctorForCreate|array $doctor): Response
    {
        return $this->connector->send(new CreateMedicalDoctorRequest($surgeryId, $doctor));
    }

    public function delete(string $surgeryId, int $doctorId): Response
    {
        return $this->connector->send(new DeleteMedicalDoctorRequest($surgeryId, $doctorId));
    }

    public function get(string $surgeryId, int $doctorId): Response
    {
        return $this->connector->send(new GetMedicalDoctorRequest($surgeryId, $doctorId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patch(string $surgeryId, int $doctorId, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchMedicalDoctorRequest($surgeryId, $doctorId, $patch));
    }
}
