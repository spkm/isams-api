<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\PortalList;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\MedicalCentre\MedicalMedicationSupplier;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all medical medication suppliers.
 *
 * GET /api/portals/list/medicalmedicationsuppliers
 */
class GetPortalListMedicalMedicationSuppliersRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = MedicalMedicationSupplier::class;
    public string $resultKey = 'medicalMedicationSuppliers';

    public function resolveEndpoint(): string
    {
        return '/api/portals/list/medicalmedicationsuppliers';
    }
}
