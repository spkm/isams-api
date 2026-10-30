<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\News;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class News extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?bool $archived = null,
        public ?string $bookmarkName = null,
        public ?string $bookmarkUrl = null,
        public ?CarbonImmutable $date = null,
        public ?string $fileDescription = null,
        public ?string $fileDirectory = null,
        public ?string $fileDisplayName = null,
        public ?string $fileName = null,
        public ?string $imageName = null,
        public ?string $imagePath = null,
        public ?bool $publishToParentPortal = null,
        public ?bool $publishToStudentPortal = null,
        public ?string $title = null,
        public ?string $type = null,
    ) {
    }
}
