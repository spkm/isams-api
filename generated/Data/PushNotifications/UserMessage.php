<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\PushNotifications;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class UserMessage extends Data
{
    /**
     * @param  array<string, mixed>|null  $title
     */
    public function __construct(
        public ?int $id = null,
        public ?string $category = null,
        public ?string $channelId = null,
        public ?CarbonImmutable $created = null,
        public ?string $message = null,
        public ?string $messageId = null,
        public ?int $mode = null,
        public ?string $moduleId = null,
        public ?int $objectId = null,
        public ?string $objectType = null,
        public ?int $read = null,
        public ?string $student = null,
        public ?array $title = null,
    ) {
    }
}
