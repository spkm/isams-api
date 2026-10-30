<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\HumanResources;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class SalaryForCreate extends Data
{
    protected const LISTS = ['divisionLessonCosts' => DivisionLessonCostForCreate::class];

    /**
     * @param  Collection<int, DivisionLessonCostForCreate>|null  $divisionLessonCosts
     * @param  list<int>|null  $teachingSkills
     */
    public function __construct(
        public ?float $annualPay = null,
        public ?string $appointment = null,
        public ?string $bankAccountName = null,
        public ?string $bankAccountNumber = null,
        public ?string $bankBranch = null,
        public ?string $bankName = null,
        public ?string $bankSortCode = null,
        public ?string $breakDurationPaid = null,
        public ?int $contractId = null,
        public ?bool $currentDeputy = null,
        public ?bool $deputy = null,
        public ?Collection $divisionLessonCosts = null,
        public ?int $durationPaid = null,
        public ?CarbonImmutable $effectiveDate = null,
        public ?float $hoursPerWeek = null,
        public ?float $includingAdditional = null,
        public ?string $note = null,
        public ?int $paidHolidays = null,
        public ?float $paymentPercentage = null,
        public ?int $payScaleId = null,
        public ?string $paySchedule = null,
        public ?float $percentageIncrease = null,
        public ?string $position = null,
        public ?string $scheduleDNumber = null,
        public ?string $selfEmploymentRoleTask = null,
        public ?array $teachingSkills = null,
        public ?int $unpaidHolidays = null,
        public ?int $weeksPerYear = null,
    ) {
    }
}
