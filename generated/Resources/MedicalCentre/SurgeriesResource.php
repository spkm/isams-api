<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\MedicalCentre;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\MedicalCentre\Surgery;
use spkm\IsamsApi\Data\MedicalCentre\SurgeryForCreate;
use spkm\IsamsApi\Requests\MedicalCentre\Surgeries\CreateMedicalSurgeryRequest;
use spkm\IsamsApi\Requests\MedicalCentre\Surgeries\DeleteMedicalSurgeryRequest;
use spkm\IsamsApi\Requests\MedicalCentre\Surgeries\GetMedicalSurgeriesRequest;
use spkm\IsamsApi\Requests\MedicalCentre\Surgeries\GetMedicalSurgeryRequest;
use spkm\IsamsApi\Requests\MedicalCentre\Surgeries\PatchMedicalSurgeryRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class SurgeriesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\MedicalCentre\Surgery>
     * @see \spkm\IsamsApi\Requests\MedicalCentre\Surgeries\GetMedicalSurgeriesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetMedicalSurgeriesRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\MedicalCentre\SurgeryForCreate|array<string, mixed>  $surgery
     * @see \spkm\IsamsApi\Requests\MedicalCentre\Surgeries\CreateMedicalSurgeryRequest
     */
    public function create(SurgeryForCreate|array $surgery): Created
    {
        return $this->fetch(new CreateMedicalSurgeryRequest(surgery: $surgery));
    }

    /**
     * @see \spkm\IsamsApi\Requests\MedicalCentre\Surgeries\DeleteMedicalSurgeryRequest
     */
    public function delete(int $surgeryId): void
    {
        $this->fetch(new DeleteMedicalSurgeryRequest(surgeryId: $surgeryId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\MedicalCentre\Surgeries\GetMedicalSurgeryRequest
     */
    public function get(int $surgeryId): Surgery
    {
        return $this->fetch(new GetMedicalSurgeryRequest(surgeryId: $surgeryId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\MedicalCentre\Surgeries\PatchMedicalSurgeryRequest
     */
    public function patch(int $surgeryId, JsonPatch|array $patch): void
    {
        $this->fetch(new PatchMedicalSurgeryRequest(surgeryId: $surgeryId, patch: $patch));
    }
}
