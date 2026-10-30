<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class EmailConversationMessage extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?int $attachmentCount = null,
        public ?string $body = null,
        public ?string $fromEmail = null,
        public ?string $fromName = null,
        public ?CarbonImmutable $receivedOn = null,
        public ?int $recipientCount = null,
        public ?string $subject = null,
    ) {
    }
}
