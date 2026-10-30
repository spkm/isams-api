<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\MedicalCentre;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\MedicalCentre\Inventory;
use spkm\IsamsApi\Data\MedicalCentre\InventoryForCreate;
use spkm\IsamsApi\Requests\MedicalCentre\StudentInventory\ArchiveStudentInventoryRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentInventory\CreateStudentInventoryRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentInventory\DeleteStudentInventoryRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentInventory\GetStudentInventoriesRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentInventory\GetStudentInventoryRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentInventory\PatchStudentInventoryRequest;
use spkm\IsamsApi\Requests\MedicalCentre\StudentInventory\RestoreStudentInventoryRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class StudentInventoryResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\MedicalCentre\Inventory>
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentInventory\GetStudentInventoriesRequest
     */
    public function all(string $schoolId, ?bool $includeArchive = null): Collection
    {
        return $this->fetch(new GetStudentInventoriesRequest(schoolId: $schoolId, includeArchive: $includeArchive));
    }

    /**
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentInventory\ArchiveStudentInventoryRequest
     */
    public function archive(string $schoolId, string $inventoryId): Created
    {
        return $this->fetch(new ArchiveStudentInventoryRequest(schoolId: $schoolId, inventoryId: $inventoryId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\MedicalCentre\InventoryForCreate|array<string, mixed>  $inventory
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentInventory\CreateStudentInventoryRequest
     */
    public function create(string $schoolId, InventoryForCreate|array $inventory): Created
    {
        return $this->fetch(new CreateStudentInventoryRequest(schoolId: $schoolId, inventory: $inventory));
    }

    /**
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentInventory\DeleteStudentInventoryRequest
     */
    public function delete(string $schoolId, string $inventoryId): bool
    {
        $this->fetch(new DeleteStudentInventoryRequest(schoolId: $schoolId, inventoryId: $inventoryId));

        return true;
    }

    /**
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentInventory\GetStudentInventoryRequest
     */
    public function get(string $schoolId, string $inventoryId): Inventory
    {
        return $this->fetch(new GetStudentInventoryRequest(schoolId: $schoolId, inventoryId: $inventoryId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentInventory\PatchStudentInventoryRequest
     */
    public function patch(string $schoolId, string $inventoryId, JsonPatch|array $patch): bool
    {
        $this->fetch(new PatchStudentInventoryRequest(schoolId: $schoolId, inventoryId: $inventoryId, patch: $patch));

        return true;
    }

    /**
     * @see \spkm\IsamsApi\Requests\MedicalCentre\StudentInventory\RestoreStudentInventoryRequest
     */
    public function restore(string $schoolId, string $inventoryId): Created
    {
        return $this->fetch(new RestoreStudentInventoryRequest(schoolId: $schoolId, inventoryId: $inventoryId));
    }
}
