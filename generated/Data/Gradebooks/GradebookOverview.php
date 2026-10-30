<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Gradebooks;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class GradebookOverview extends Data
{
    protected const LISTS = ['tags' => TagBase::class];

    /**
     * @param  Collection<int, TagBase>  $tags
     */
    public function __construct(
        public ?int $id = null,
        public ?string $description = null,
        public ?bool $isDueForDataEntryToday = null,
        public ?string $modifiedByUserCode = null,
        public ?CarbonImmutable $modifiedOn = null,
        public ?string $name = null,
        public ?int $numberOfAssessmentColumns = null,
        public ?int $numberOfCalculatedColumns = null,
        public ?int $numberOfOwnedSharedColumns = null,
        public ?int $numberOfPupils = null,
        public ?int $numberOfStaff = null,
        public Collection $tags = new Collection,
    ) {
    }
}
