<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\TrackingManager\ExternalData;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchData;

readonly class Data extends BatchData
{
    protected const LISTS = ['aspects' => Aspect::class];

    /**
     * @param  Collection<int, Aspect>  $aspects
     */
    public function __construct(
        public ?int $id = null,
        public ?string $type = null,
        public ?string $name = null,
        public ?string $code = null,
        public ?string $description = null,
        public ?bool $imported = null,
        public ?bool $active = null,
        public ?CarbonImmutable $startDate = null,
        public ?CarbonImmutable $endDate = null,
        public ?bool $ordinal = null,
        public ?int $adjustment = null,
        public ?string $directory = null,
        public ?string $filename = null,
        public ?string $author = null,
        public ?CarbonImmutable $created = null,
        public ?string $editor = null,
        public ?CarbonImmutable $lastUpdated = null,
        public Collection $aspects = new Collection,
    ) {
    }
}
