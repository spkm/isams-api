<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\RewardsAndConduct\Fields;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchData;

readonly class Field extends BatchData
{
    protected const LISTS = ['values' => Value::class];

    /**
     * @param  Collection<int, Value>  $values
     */
    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public ?string $code = null,
        public ?string $description = null,
        public ?string $image = null,
        public ?int $ordinal = null,
        public ?bool $active = null,
        public ?string $author = null,
        public ?CarbonImmutable $lastUpdated = null,
        public Collection $values = new Collection,
    ) {
    }
}
