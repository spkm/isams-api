<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\RewardsAndConduct\Types;

use spkm\IsamsApi\Batch\BatchData;

readonly class Type extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $categoryId = null,
        public ?int $positive = null,
        public ?string $name = null,
        public ?string $code = null,
        public ?string $category = null,
        public ?bool $categoryActive = null,
        public ?string $categoryDescription = null,
        public ?int $categoryValue = null,
    ) {
    }
}
