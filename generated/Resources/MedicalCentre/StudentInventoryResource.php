<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\MedicalCentre;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\MedicalCentre\InventoryForCreate;
use spkm\IsamsApi\Requests\MedicalCentre\StudentInventory\ArchiveStudentInventoryRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentInventory\CreateStudentInventoryRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentInventory\DeleteStudentInventoryRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentInventory\GetStudentInventoriesRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentInventory\GetStudentInventoryRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentInventory\PatchStudentInventoryRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentInventory\RestoreStudentInventoryRequest;
use spkm\IsamsApi\Support\JsonPatch;

class StudentInventoryResource extends BaseResource
{
    public function archiveStudentInventory(string $schoolId, string $inventoryId): Response
    {
        return $this->connector->send(new ArchiveStudentInventoryRequest($schoolId, $inventoryId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\MedicalCentre\InventoryForCreate|array<string, mixed>  $inventory
     */
    public function createStudentInventory(string $schoolId, InventoryForCreate|array $inventory): Response
    {
        return $this->connector->send(new CreateStudentInventoryRequest($schoolId, $inventory));
    }

    public function deleteStudentInventory(string $schoolId, string $inventoryId): Response
    {
        return $this->connector->send(new DeleteStudentInventoryRequest($schoolId, $inventoryId));
    }

    public function getStudentInventories(string $schoolId, ?bool $includeArchive = null): Response
    {
        return $this->connector->send(new GetStudentInventoriesRequest($schoolId, $includeArchive));
    }

    public function getStudentInventory(string $schoolId, string $inventoryId): Response
    {
        return $this->connector->send(new GetStudentInventoryRequest($schoolId, $inventoryId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patchStudentInventory(string $schoolId, string $inventoryId, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchStudentInventoryRequest($schoolId, $inventoryId, $patch));
    }

    public function restoreStudentInventory(string $schoolId, string $inventoryId): Response
    {
        return $this->connector->send(new RestoreStudentInventoryRequest($schoolId, $inventoryId));
    }
}
