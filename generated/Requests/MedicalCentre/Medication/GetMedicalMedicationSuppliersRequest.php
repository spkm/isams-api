<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\MedicalCentre\Medication;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\MedicationSupplier;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves Medication Suppliers.
 *
 * GET /api/medical/medicationsuppliers
 */
class GetMedicalMedicationSuppliersRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = MedicationSupplier::class;
    public string $resultKey = 'medicationSuppliers';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/medical/medicationsuppliers';
    }
}
