<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\StudentInventory;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\Inventory;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a medical inventory for a student.
 *
 * GET /api/medical/students/{schoolId}/inventory/{inventoryId}
 */
class GetStudentInventoryRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = Inventory::class;

    public function __construct(
        protected string $schoolId,
        protected string $inventoryId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/medical/students/'.rawurlencode((string) $this->schoolId).'/inventory/'.rawurlencode((string) $this->inventoryId);
    }
}
