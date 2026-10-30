<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\PupilManager\Siblings;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchData;

readonly class Pupil extends BatchData
{
    protected const LISTS = ['siblings' => Sibling::class];

    /**
     * @param  Collection<int, Sibling>  $siblings
     */
    public function __construct(
        public ?int $id = null,
        public ?int $authorId = null,
        public ?string $personGuid = null,
        public Collection $siblings = new Collection,
        public ?string $status = null,
        public ?string $author = null,
    ) {
    }
}
