<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\PushNotifications;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class NotificationChannel extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?bool $active = null,
        public ?bool $builtIn = null,
        public ?string $channelId = null,
        public ?CarbonImmutable $created = null,
        public ?string $createdBy = null,
        public ?string $description = null,
        public ?string $displayName = null,
        public ?CarbonImmutable $edited = null,
        public ?string $editedBy = null,
        public ?string $name = null,
        public ?int $ordinal = null,
        public ?bool $showDescription = null,
    ) {
    }
}
