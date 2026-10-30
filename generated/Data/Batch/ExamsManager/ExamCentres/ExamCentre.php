<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\ExamsManager\ExamCentres;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class ExamCentre extends BatchData
{
    public function __construct(
        public ?string $id = null,
        public ?int $authorId = null,
        public ?string $name = null,
        public ?string $postcode = null,
        public ?bool $default = null,
        public ?CarbonImmutable $lastUpdated = null,
    ) {
    }
}
