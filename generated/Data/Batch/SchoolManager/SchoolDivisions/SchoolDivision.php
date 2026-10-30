<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\SchoolManager\SchoolDivisions;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchData;

readonly class SchoolDivision extends BatchData
{
    protected const LISTS = ['years' => Year::class];

    /**
     * @param  Collection<int, Year>  $years
     */
    public function __construct(
        public ?int $id = null,
        public ?string $author = null,
        public ?string $name = null,
        public ?string $code = null,
        public ?CarbonImmutable $lastUpdated = null,
        public Collection $years = new Collection,
    ) {
    }
}
