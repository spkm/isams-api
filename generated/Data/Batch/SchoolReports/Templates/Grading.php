<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\SchoolReports\Templates;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchData;

readonly class Grading extends BatchData
{
    protected const LISTS = ['values' => Value::class];

    /**
     * @param  Collection<int, Value>  $values
     */
    public function __construct(
        public ?int $id = null,
        public ?bool $useGrading = null,
        public ?string $name = null,
        public ?string $shortName = null,
        public ?string $options = null,
        public ?string $optionLimits = null,
        public ?string $default = null,
        public ?bool $required = null,
        public ?string $author = null,
        public ?CarbonImmutable $lastUpdated = null,
        public Collection $values = new Collection,
    ) {
    }
}
