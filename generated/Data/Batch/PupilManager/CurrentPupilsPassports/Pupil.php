<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\PupilManager\CurrentPupilsPassports;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchData;

readonly class Pupil extends BatchData
{
    protected const LISTS = ['passports' => Passport::class];

    /**
     * @param  Collection<int, Passport>  $passports
     */
    public function __construct(
        public ?int $id = null,
        public ?string $personGuid = null,
        public Collection $passports = new Collection,
    ) {
    }
}
