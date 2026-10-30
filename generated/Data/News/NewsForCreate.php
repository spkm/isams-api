<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\News;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class NewsForCreate extends Data
{
    public function __construct(
        public string $title,
        public int $typeId,
        public ?CarbonImmutable $archiveDate = null,
        public ?string $author = null,
        public ?bool $authorised = null,
        public ?string $body = null,
        public ?CarbonImmutable $publishDate = null,
        public ?bool $publishToEmployees = null,
        public ?bool $publishToParentPortal = null,
        public ?bool $publishToStudentPortal = null,
        public ?string $summary = null,
    ) {
    }
}
