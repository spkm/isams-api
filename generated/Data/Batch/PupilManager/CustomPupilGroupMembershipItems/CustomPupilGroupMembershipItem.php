<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\PupilManager\CustomPupilGroupMembershipItems;

use spkm\IsamsApi\Batch\BatchData;

readonly class CustomPupilGroupMembershipItem extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $pupilId = null,
        public ?int $personId = null,
        public ?string $personGuid = null,
        public ?string $schoolId = null,
        public ?int $customGroupID = null,
        public ?bool $deleted = null,
        public ?bool $hidden = null,
    ) {
    }
}
