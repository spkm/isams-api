<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class StudentCommunicationHistoryForCreate extends Data
{
    protected const LISTS = ['recipients' => StudentCommunicationRecipientForCreate::class];

    /**
     * @param  Collection<int, StudentCommunicationRecipientForCreate>|null  $recipients
     */
    public function __construct(
        public ?string $body = null,
        public ?Collection $recipients = null,
        public ?string $senderEmail = null,
        public ?string $senderName = null,
        public ?CarbonImmutable $sentDate = null,
        public ?string $subject = null,
    ) {
    }
}
