<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Registration;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Registration\Enums\RegistrationPeriodRegistrationType;

readonly class RegistrationPeriod extends Data
{
    protected const LISTS = ['divisions' => SchoolDivision::class];

    /**
     * @param  Collection<int, SchoolDivision>  $divisions
     */
    public function __construct(
        public ?int $id = null,
        public Collection $divisions = new Collection,
        public ?CarbonImmutable $finish = null,
        public ?string $friendlyName = null,
        public ?int $numberOfStudents = null,
        public ?int $registerId = null,
        public ?int $registrationRuleId = null,
        public ?string $registrationType = null,
        public ?CarbonImmutable $start = null,
        public ?CarbonImmutable $time = null,
    ) {
    }

    public function registrationTypeEnum(): ?RegistrationPeriodRegistrationType
    {
        return RegistrationPeriodRegistrationType::tryFrom((string) $this->registrationType);
    }
}
