<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\RewardsAndConduct\Records;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchData;

readonly class Record extends BatchData
{
    protected const LISTS = ['fieldValues' => FieldValue::class];

    /**
     * @param  Collection<int, FieldValue>  $fieldValues
     */
    public function __construct(
        public ?int $id = null,
        public ?int $typeId = null,
        public ?int $categoryId = null,
        public ?string $guid = null,
        public ?int $type = null,
        public ?string $schoolId = null,
        public ?string $teacher = null,
        public ?CarbonImmutable $date = null,
        public ?int $categoryValue = null,
        public ?string $description = null,
        public ?bool $resolved = null,
        public ?bool $authorised = null,
        public ?string $authorisedBy = null,
        public ?CarbonImmutable $authorisedOn = null,
        public ?bool $rejected = null,
        public ?string $author = null,
        public ?CarbonImmutable $lastUpdated = null,
        public Collection $fieldValues = new Collection,
    ) {
    }
}
