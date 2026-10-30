<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\SchoolReports\Templates;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class Result extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?bool $useResult = null,
        public ?string $name = null,
        public ?string $shortName = null,
        public ?bool $required = null,
        public ?string $errorMessage = null,
        public ?int $minimumValue = null,
        public ?int $maximumValue = null,
        public ?bool $isNumericValue = null,
        public ?string $author = null,
        public ?CarbonImmutable $lastUpdated = null,
    ) {
    }
}
