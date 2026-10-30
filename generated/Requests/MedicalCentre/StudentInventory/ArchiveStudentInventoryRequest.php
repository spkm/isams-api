<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\StudentInventory;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Archives a medical inventory for a student.
 *
 * POST /api/medical/students/{schoolId}/inventory/{inventoryId}/commands/archive
 */
class ArchiveStudentInventoryRequest extends IsamsRequest
{
    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    public function __construct(
        protected string $schoolId,
        protected string $inventoryId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/medical/students/'.rawurlencode((string) $this->schoolId).'/inventory/'.rawurlencode((string) $this->inventoryId).'/commands/archive';
    }
}
