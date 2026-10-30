<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\RegistrationManager\OutOfSchool;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class Pupil extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $pupilId = null,
        public ?int $code = null,
        public ?string $reason = null,
        public ?string $notes = null,
        public ?CarbonImmutable $startDate = null,
        public ?CarbonImmutable $endDate = null,
        public ?string $author = null,
        public ?CarbonImmutable $lastUpdated = null,
    ) {
    }
}
