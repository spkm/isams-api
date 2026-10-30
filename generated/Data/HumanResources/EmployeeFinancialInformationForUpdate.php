<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\HumanResources;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\Enums\EmployeeFinancialInformationStarterDeclaration;

readonly class EmployeeFinancialInformationForUpdate extends Data
{
    public function __construct(
        public ?bool $isBupaMember = null,
        public ?string $nationalInsuranceNumber = null,
        public ?string $payrollNumber = null,
        public ?CarbonImmutable $pensionStartDate = null,
        public ?string $starterDeclaration = null,
    ) {
    }

    public function starterDeclarationEnum(): ?EmployeeFinancialInformationStarterDeclaration
    {
        return EmployeeFinancialInformationStarterDeclaration::tryFrom((string) $this->starterDeclaration);
    }
}
