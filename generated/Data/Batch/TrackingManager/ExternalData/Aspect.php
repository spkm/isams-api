<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\TrackingManager\ExternalData;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchData;

readonly class Aspect extends BatchData
{
    protected const LISTS = ['results' => Result::class];

    /**
     * @param  Collection<int, Result>  $results
     */
    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public ?string $code = null,
        public ?string $description = null,
        public ?int $minimumValue = null,
        public ?int $maximumValue = null,
        public ?int $subject = null,
        public ?string $author = null,
        public ?CarbonImmutable $created = null,
        public ?string $editor = null,
        public ?CarbonImmutable $lastUpdated = null,
        public Collection $results = new Collection,
    ) {
    }
}
