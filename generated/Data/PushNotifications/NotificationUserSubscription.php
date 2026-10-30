<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\PushNotifications;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class NotificationUserSubscription extends Data
{
    public function __construct(
        public ?bool $active = null,
        public ?bool $autoSubscribe = null,
        public ?bool $builtIn = null,
        public ?string $channelId = null,
        public ?int $channelIntId = null,
        public ?CarbonImmutable $created = null,
        public ?string $createdBy = null,
        public ?string $description = null,
        public ?string $displayName = null,
        public ?CarbonImmutable $edited = null,
        public ?string $editedBy = null,
        public ?bool $enabled = null,
        public ?bool $hidden = null,
        public ?string $name = null,
        public ?int $ordinal = null,
        public ?string $pushGroup = null,
        public ?bool $showDescritpion = null,
    ) {
    }
}
