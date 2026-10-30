<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\WellbeingManager;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class Concern extends Data
{
    /**
     * @param  list<int>  $concernAreas
     * @param  list<int>  $concernGirfecAreas
     * @param  list<int>  $concernVisibilityGroups
     */
    public function __construct(
        public ?int $id = null,
        public array $concernAreas = [],
        public array $concernGirfecAreas = [],
        public ?int $concernSeverityId = null,
        public ?int $concernStatusId = null,
        public array $concernVisibilityGroups = [],
        public ?string $details = null,
        public ?bool $hasAccess = null,
        public ?int $indicatorId = null,
        public ?CarbonImmutable $lastUpdated = null,
        public ?string $lastUpdatedBy = null,
        public ?string $location = null,
        public ?string $nature = null,
        public ?CarbonImmutable $raisedDate = null,
        public ?string $schoolId = null,
        public ?string $sourceId = null,
        public ?int $typeId = null,
        public ?string $visibilityGroups = null,
    ) {
    }
}
