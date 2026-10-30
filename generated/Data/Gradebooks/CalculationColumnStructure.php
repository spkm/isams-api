<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Gradebooks;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Gradebooks\Enums\CalculationColumnStructureCalculationRoundingType;
use spkm\IsamsApi\Data\Gradebooks\Enums\CalculationColumnStructureSharedColumnType;

readonly class CalculationColumnStructure extends Data
{
    /**
     * @param  list<int>  $transposeIds
     * @param  list<int>  $weightingIds
     */
    public function __construct(
        public ?int $id = null,
        public ?float $calculationRounding = null,
        public ?string $calculationRoundingType = null,
        public ?int $formatRuleId = null,
        public ?string $formula = null,
        public ?int $groupId = null,
        public ?CarbonImmutable $historicalDate = null,
        public ?bool $isHidden = null,
        public ?string $name = null,
        public ?string $publishedName = null,
        public ?CarbonImmutable $publishToParentPortalFrom = null,
        public ?CarbonImmutable $publishToParentPortalTo = null,
        public ?CarbonImmutable $publishToStudentPortalFrom = null,
        public ?CarbonImmutable $publishToStudentPortalTo = null,
        public ?int $reportingKeyId = null,
        public ?string $sharedColumnType = null,
        public ?string $shortName = null,
        public ?int $styleId = null,
        public ?int $targetedColumnId = null,
        public array $transposeIds = [],
        public ?float $weighting = null,
        public array $weightingIds = [],
    ) {
    }

    public function calculationRoundingTypeEnum(): ?CalculationColumnStructureCalculationRoundingType
    {
        return CalculationColumnStructureCalculationRoundingType::tryFrom((string) $this->calculationRoundingType);
    }

    public function sharedColumnTypeEnum(): ?CalculationColumnStructureSharedColumnType
    {
        return CalculationColumnStructureSharedColumnType::tryFrom((string) $this->sharedColumnType);
    }
}
