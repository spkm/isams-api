<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\HumanResources;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class Salary extends Data
{
    protected const LISTS = [
        'additionalPayments' => AdditionalPayment::class,
        'divisionLessonCosts' => DivisionLessonCost::class,
        'teachingSkills' => TeachingSkill::class,
    ];

    /**
     * @param  Collection<int, AdditionalPayment>  $additionalPayments
     * @param  Collection<int, DivisionLessonCost>  $divisionLessonCosts
     * @param  Collection<int, TeachingSkill>  $teachingSkills
     */
    public function __construct(
        public ?int $id = null,
        public Collection $additionalPayments = new Collection,
        public ?float $additionalTotal = null,
        public ?float $annualPay = null,
        public ?string $annualPayDisplay = null,
        public ?string $appointment = null,
        public ?bool $archived = null,
        public ?string $archivedBy = null,
        public ?string $bankAccountName = null,
        public ?string $bankAccountNumber = null,
        public ?string $bankBranch = null,
        public ?string $bankName = null,
        public ?string $bankSortCode = null,
        public ?string $breakDurationPaid = null,
        public ?int $contractId = null,
        public ?bool $currentDeputy = null,
        public ?CarbonImmutable $dateArchived = null,
        public ?bool $deputy = null,
        public Collection $divisionLessonCosts = new Collection,
        public ?int $durationPaid = null,
        public ?CarbonImmutable $effectiveDate = null,
        public ?float $hoursPerWeek = null,
        public ?float $includingAdditional = null,
        public ?string $includingAdditionalDisplay = null,
        public ?CarbonImmutable $lastUpdated = null,
        public ?string $lastUpdatedBy = null,
        public ?string $note = null,
        public ?int $paidHolidays = null,
        public ?float $paymentPercentage = null,
        public ?string $payScale = null,
        public ?int $payScaleId = null,
        public ?string $paySchedule = null,
        public ?float $percentageIncrease = null,
        public ?string $position = null,
        public ?string $scheduleDNumber = null,
        public ?string $selfEmploymentRoleTask = null,
        public Collection $teachingSkills = new Collection,
        public ?int $unpaidHolidays = null,
        public ?int $weeksPerYear = null,
    ) {
    }
}
