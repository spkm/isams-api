<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Notifications;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class NotificationSettingPublicDto extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?bool $detentionEmail = null,
        public ?bool $detentionSMS = null,
        public ?bool $registrationEmail = null,
        public ?bool $registrationSMS = null,
        public ?bool $rewardAndConductEmail = null,
        public ?bool $rewardAndConductSMS = null,
        public ?string $submittedBy = null,
        public ?CarbonImmutable $submittedDateTime = null,
        public ?string $userCode = null,
    ) {
    }
}
