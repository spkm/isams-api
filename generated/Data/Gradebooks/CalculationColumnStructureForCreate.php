<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Gradebooks;

use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Gradebooks\Enums\CalculationColumnStructureForCreateCalculationRoundingType;
use spkm\IsamsApi\Data\Gradebooks\Enums\CalculationColumnStructureForCreateShareable;

readonly class CalculationColumnStructureForCreate extends Data
{
    /**
     * @param  list<int>|null  $transposeIds
     * @param  list<int>|null  $weightingIds
     */
    public function __construct(
        public string $name,
        public ?float $calculationRounding = null,
        public ?string $calculationRoundingType = null,
        public ?string $formula = null,
        public ?int $groupId = null,
        public ?bool $isHidden = null,
        public ?string $reportingKey = null,
        public ?string $shareable = null,
        public ?array $transposeIds = null,
        public ?float $weighting = null,
        public ?array $weightingIds = null,
    ) {
    }

    public function calculationRoundingTypeEnum(): ?CalculationColumnStructureForCreateCalculationRoundingType
    {
        return CalculationColumnStructureForCreateCalculationRoundingType::tryFrom((string) $this->calculationRoundingType);
    }

    public function shareableEnum(): ?CalculationColumnStructureForCreateShareable
    {
        return CalculationColumnStructureForCreateShareable::tryFrom((string) $this->shareable);
    }
}
