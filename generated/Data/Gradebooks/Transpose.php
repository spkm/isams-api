<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Gradebooks;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class Transpose extends Data
{
    protected const LISTS = ['transposeItems' => TransposeItemBase::class];

    /**
     * @param  Collection<int, TransposeItemBase>  $transposeItems
     */
    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public Collection $transposeItems = new Collection,
    ) {
    }
}
