<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Homework;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class Homework extends Data
{
    protected const LISTS = ['tags' => Tag::class];

    /**
     * @param  Collection<int, Tag>  $tags
     */
    public function __construct(
        public ?int $id = null,
        public ?string $description = null,
        public ?CarbonImmutable $dueDate = null,
        public ?int $durationMinutes = null,
        public ?int $lateSubmissionAllowanceDays = null,
        public ?CarbonImmutable $publishDate = null,
        public ?string $setBy = null,
        public ?string $setByForename = null,
        public ?string $setBySurname = null,
        public Collection $tags = new Collection,
        public ?string $title = null,
    ) {
    }
}
