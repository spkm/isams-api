<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Gradebooks;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class Comment extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $authorUserCode = null,
        public ?CarbonImmutable $createdDateTime = null,
        public ?bool $isPublishedToParentPortal = null,
        public ?bool $isPublishedToStudentPortal = null,
        public ?string $mark = null,
        public ?CarbonImmutable $modifiedDateTime = null,
        public ?string $value = null,
    ) {
    }
}
