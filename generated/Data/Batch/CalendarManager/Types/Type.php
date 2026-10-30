<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\CalendarManager\Types;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class Type extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $authorId = null,
        public ?string $name = null,
        public ?string $author = null,
        public ?CarbonImmutable $lastUpdated = null,
        public ?bool $viewableToStaff = null,
        public ?bool $viewableInStudentPortal = null,
        public ?bool $viewableInParentPortal = null,
        public ?bool $includedInPublicFeeds = null,
    ) {
    }
}
