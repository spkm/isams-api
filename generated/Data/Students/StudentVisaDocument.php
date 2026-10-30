<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class StudentVisaDocument extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?int $categoryId = null,
        public ?string $categoryName = null,
        public ?string $createdBy = null,
        public ?CarbonImmutable $createdOn = null,
        public ?string $description = null,
        public ?int $downloads = null,
        public ?string $filename = null,
        public ?string $filePath = null,
        public ?int $fileSize = null,
        public ?string $fileType = null,
        public ?string $modifiedBy = null,
        public ?CarbonImmutable $modifiedOn = null,
        public ?string $name = null,
        public ?string $username = null,
    ) {
    }
}
