<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\PupilManager\CurrentPupilsHealth;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchData;
use spkm\IsamsApi\Data\Batch\PupilManager\CustomField;

readonly class Pupil extends BatchData
{
    protected const LISTS = ['customFields' => CustomField::class];

    /**
     * @param  Collection<int, CustomField>  $customFields
     */
    public function __construct(
        public ?int $id = null,
        public ?int $personId = null,
        public ?string $personGuid = null,
        public ?string $healthNotes = null,
        public ?string $dentalNotes = null,
        public ?string $hearingNotes = null,
        public ?string $ophthalmicNotes = null,
        public ?string $tripBadge1 = null,
        public ?string $tripBadge2 = null,
        public ?string $tripBadge3 = null,
        public ?string $tripNotes = null,
        public Collection $customFields = new Collection,
    ) {
    }
}
