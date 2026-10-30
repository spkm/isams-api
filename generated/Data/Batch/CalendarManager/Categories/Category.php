<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\CalendarManager\Categories;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchData;

readonly class Category extends BatchData
{
    protected const LISTS = ['subcategories' => Subcategory::class];

    /**
     * @param  Collection<int, Subcategory>  $subcategories
     */
    public function __construct(
        public ?int $id = null,
        public ?int $authorId = null,
        public ?string $author = null,
        public ?string $name = null,
        public ?CarbonImmutable $lastUpdated = null,
        public Collection $subcategories = new Collection,
    ) {
    }
}
