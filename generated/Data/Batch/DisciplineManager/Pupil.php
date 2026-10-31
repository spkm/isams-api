<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\DisciplineManager;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class Pupil extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?string $schoolId = null,
        public ?CarbonImmutable $detentionDate = null,
        public ?CarbonImmutable $eventStart = null,
        public ?CarbonImmutable $eventEnd = null,
        public ?bool $isDoubleDetention = null,
        public ?string $offenceCode = null,
        public ?string $offenceDescription = null,
        public ?bool $present = null,
        public ?bool $authorised = null,
        public ?string $authorisedBy = null,
        public ?CarbonImmutable $authorisedOn = null,
        public ?string $author = null,
        public ?CarbonImmutable $lastUpdated = null,
    ) {
    }
}
