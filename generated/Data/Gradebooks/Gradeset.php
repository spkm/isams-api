<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Gradebooks;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class Gradeset extends Data
{
    protected const LISTS = ['gradesetItems' => GradesetItemBase::class];

    /**
     * @param  Collection<int, GradesetItemBase>  $gradesetItems
     */
    public function __construct(
        public ?int $id = null,
        public Collection $gradesetItems = new Collection,
        public ?string $name = null,
    ) {
    }
}
