<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class EmailMessage extends Data
{
    /**
     * @param  list<string>  $attachmentDirectories
     * @param  list<string>  $attachments
     */
    public function __construct(
        public array $attachmentDirectories = [],
        public array $attachments = [],
        public ?int $batch = null,
        public ?string $body = null,
        public ?string $conversationGuid = null,
        public ?string $emailAddress = null,
        public ?int $emailId = null,
        public ?bool $hasConversation = null,
        public ?CarbonImmutable $sentOn = null,
        public ?string $subject = null,
    ) {
    }
}
