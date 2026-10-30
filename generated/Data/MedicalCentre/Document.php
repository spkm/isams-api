<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\MedicalCentre;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class Document extends Data
{
    public function __construct(
        public ?bool $archived = null,
        public ?int $categoryId = null,
        public ?string $description = null,
        public ?int $documentSourceId = null,
        public ?int $downloadCount = null,
        public ?string $fileName = null,
        public ?string $filePath = null,
        public ?string $fileReference = null,
        public ?int $fileSize = null,
        public ?string $fileType = null,
        public ?string $key = null,
        public ?CarbonImmutable $lastUpdated = null,
        public ?string $lastUpdatedBy = null,
        public ?string $name = null,
        public ?int $sensitivity = null,
    ) {
    }
}
