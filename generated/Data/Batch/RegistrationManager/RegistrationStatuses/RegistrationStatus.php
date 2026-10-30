<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\RegistrationManager\RegistrationStatuses;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class RegistrationStatus extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $pupilId = null,
        public ?bool $registered = null,
        public ?CarbonImmutable $registrationDateTime = null,
        public ?CarbonImmutable $registrationDate = null,
        public ?int $code = null,
        public ?int $presentCode = null,
        public ?string $reason = null,
        public ?bool $late = null,
        public ?int $minutesLate = null,
        public ?bool $lateCleared = null,
        public ?bool $lateDetention = null,
        public ?bool $alert = null,
        public ?bool $parentNotificationSent = null,
        public ?CarbonImmutable $leavingEarly = null,
        public ?string $author = null,
        public ?CarbonImmutable $lastUpdated = null,
        public ?int $periodId = null,
    ) {
    }
}
