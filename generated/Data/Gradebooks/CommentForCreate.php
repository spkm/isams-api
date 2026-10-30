<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Gradebooks;

use spkm\IsamsApi\Data\Data;

readonly class CommentForCreate extends Data
{
    public function __construct(
        public string $value,
        public ?string $authorId = null,
        public ?bool $isPublishedToParentPortal = null,
        public ?bool $isPublishedToStudentPortal = null,
        public ?string $mark = null,
    ) {
    }
}
