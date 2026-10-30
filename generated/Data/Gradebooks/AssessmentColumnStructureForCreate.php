<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Gradebooks;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Gradebooks\Enums\AssessmentColumnStructureShareStatus;

readonly class AssessmentColumnStructureForCreate extends Data
{
    /**
     * @param  list<int>|null  $indicatorIds
     * @param  list<string>|null  $studentExclusions
     * @param  list<int>|null  $transposeIds
     * @param  list<int>|null  $weightingIds
     */
    public function __construct(
        public string $name,
        public ?CarbonImmutable $assessmentDate = null,
        public ?CarbonImmutable $dateAvailableFrom = null,
        public ?CarbonImmutable $dateAvailableTo = null,
        public ?int $gradesetId = null,
        public ?int $groupId = null,
        public ?array $indicatorIds = null,
        public ?bool $isHidden = null,
        public ?float $maximum = null,
        public ?string $publishedName = null,
        public ?CarbonImmutable $publishToParentPortalFrom = null,
        public ?CarbonImmutable $publishToParentPortalTo = null,
        public ?CarbonImmutable $publishToStudentPortalFrom = null,
        public ?CarbonImmutable $publishToStudentPortalTo = null,
        public ?int $reportingKeyId = null,
        public ?string $shareStatus = null,
        public ?string $shortName = null,
        public ?array $studentExclusions = null,
        public ?int $styleDesignId = null,
        public ?int $styleRuleId = null,
        public ?array $transposeIds = null,
        public ?float $weighting = null,
        public ?array $weightingIds = null,
    ) {
    }

    public function shareStatusEnum(): ?AssessmentColumnStructureShareStatus
    {
        return AssessmentColumnStructureShareStatus::tryFrom((string) $this->shareStatus);
    }
}
