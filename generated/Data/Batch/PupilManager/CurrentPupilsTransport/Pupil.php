<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\PupilManager\CurrentPupilsTransport;

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
        public ?Transport $transport = null,
        public ?string $transportNotes = null,
        public Collection $customFields = new Collection,
    ) {
    }
}
