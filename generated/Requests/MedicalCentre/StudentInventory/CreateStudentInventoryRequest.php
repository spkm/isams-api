<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\StudentInventory;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\MedicalCentre\InventoryForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a medical inventory for a student.
 *
 * POST /api/medical/students/{schoolId}/inventory
 */
class CreateStudentInventoryRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\MedicalCentre\InventoryForCreate|array<string, mixed>  $inventory
     */
    public function __construct(
        protected string $schoolId,
        protected InventoryForCreate|array $inventory,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/medical/students/'.rawurlencode((string) $this->schoolId).'/inventory';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->inventory instanceof Data ? $this->inventory->toArray() : $this->inventory;
    }
}
