<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\HumanResources;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\Enums\AbsenceCategoryCode;

readonly class Absence extends Data
{
    protected const LISTS = ['externalSystemIds' => ExternalSystemId::class];

    /**
     * @param  Collection<int, ExternalSystemId>  $externalSystemIds
     */
    public function __construct(
        public ?int $id = null,
        public ?string $absenceCategoryCode = null,
        public ?int $absenceTypeId = null,
        public ?CarbonImmutable $endDate = null,
        public Collection $externalSystemIds = new Collection,
        public ?CarbonImmutable $lastUpdated = null,
        public ?string $lastUpdatedBy = null,
        public ?string $notes = null,
        public ?CarbonImmutable $startDate = null,
        public ?float $workingDaysLost = null,
    ) {
    }

    public function absenceCategoryCodeEnum(): ?AbsenceCategoryCode
    {
        return AbsenceCategoryCode::tryFrom((string) $this->absenceCategoryCode);
    }
}
