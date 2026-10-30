<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\SchoolReports\Templates;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class Position extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?bool $usePosition = null,
        public ?string $name = null,
        public ?int $required = null,
        public ?string $errorMessage = null,
        public ?int $minimumValue = null,
        public ?int $maximumValue = null,
        public ?string $shortName = null,
        public ?string $author = null,
        public ?CarbonImmutable $lastUpdated = null,
    ) {
    }
}
