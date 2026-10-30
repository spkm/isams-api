<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Gradebooks;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class ColumnMark extends Data
{
    protected const LISTS = ['transposeValues' => TransposeMark::class];

    /**
     * @param  Collection<int, TransposeMark>  $transposeValues
     */
    public function __construct(
        public ?int $columnId = null,
        public ?string $description = null,
        public ?bool $isAbsent = null,
        public ?bool $isSubmitted = null,
        public Collection $transposeValues = new Collection,
        public ?string $value = null,
        public ?float $weightedMark = null,
    ) {
    }
}
