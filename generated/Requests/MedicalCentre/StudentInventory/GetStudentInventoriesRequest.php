<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\StudentInventory;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\Inventory;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a student's medical inventory.
 *
 * GET /api/medical/students/{schoolId}/inventory
 */
class GetStudentInventoriesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Inventory::class;
    public string $resultKey = 'inventory';

    public function __construct(
        protected string $schoolId,
        protected ?bool $includeArchive = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/medical/students/'.rawurlencode((string) $this->schoolId).'/inventory';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return array_filter([
            'includeArchive' => $this->includeArchive === null ? null : ($this->includeArchive ? 'true' : 'false'),
        ], fn (mixed $value) => $value !== null);
    }
}
