<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\MedicalCentre;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\MedicalCentre\SurgeryForCreate;
use spkm\IsamsApi\Requests\MedicalCentre\Surgeries\CreateMedicalSurgeryRequest;
use spkm\IsamsApi\Requests\MedicalCentre\Surgeries\DeleteMedicalSurgeryRequest;
use spkm\IsamsApi\Requests\MedicalCentre\Surgeries\GetMedicalSurgeriesRequest;
use spkm\IsamsApi\Requests\MedicalCentre\Surgeries\GetMedicalSurgeryRequest;
use spkm\IsamsApi\Requests\MedicalCentre\Surgeries\PatchMedicalSurgeryRequest;
use spkm\IsamsApi\Support\JsonPatch;

class SurgeriesResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\MedicalCentre\SurgeryForCreate|array<string, mixed>  $surgery
     */
    public function createMedicalSurgery(SurgeryForCreate|array $surgery): Response
    {
        return $this->connector->send(new CreateMedicalSurgeryRequest($surgery));
    }

    public function deleteMedicalSurgery(int $surgeryId): Response
    {
        return $this->connector->send(new DeleteMedicalSurgeryRequest($surgeryId));
    }

    public function getMedicalSurgeries(): Response
    {
        return $this->connector->send(new GetMedicalSurgeriesRequest());
    }

    public function getMedicalSurgery(int $surgeryId): Response
    {
        return $this->connector->send(new GetMedicalSurgeryRequest($surgeryId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patchMedicalSurgery(int $surgeryId, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchMedicalSurgeryRequest($surgeryId, $patch));
    }
}
