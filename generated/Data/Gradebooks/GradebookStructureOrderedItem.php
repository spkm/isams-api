<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Gradebooks;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Gradebooks\Enums\GradebookStructureOrderedItemStructureItemType;
use spkm\IsamsApi\Data\Gradebooks\GradebookStructureOrderedItem as GradebookStructureOrderedItem1;

readonly class GradebookStructureOrderedItem extends Data
{
    protected const LISTS = ['gradebookStructureOrderedItems' => GradebookStructureOrderedItem::class];

    /**
     * @param  Collection<int, GradebookStructureOrderedItem>  $gradebookStructureOrderedItems
     */
    public function __construct(
        public ?int $id = null,
        public Collection $gradebookStructureOrderedItems = new Collection,
        public ?string $name = null,
        public ?string $structureItemType = null,
    ) {
    }

    public function structureItemTypeEnum(): ?GradebookStructureOrderedItemStructureItemType
    {
        return GradebookStructureOrderedItemStructureItemType::tryFrom((string) $this->structureItemType);
    }
}
