<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\WellbeingManager;

use spkm\IsamsApi\Data\Data;

readonly class ConcernGirfecForm extends Data
{
    /**
     * @param  list<int>  $involvedFactors
     * @param  list<int>  $sharedWithWho
     */
    public function __construct(
        public ?int $id = null,
        public ?string $childConversationDate = null,
        public ?string $childConversationNotes = null,
        public ?string $childOnChildProtectionRegister = null,
        public ?string $childProtectionRegisterDateOff = null,
        public ?string $childProtectionRegisterDateOn = null,
        public ?string $childSpokenTo = null,
        public ?string $childSpokenToWhyNot = null,
        public ?string $dateOfContact = null,
        public array $involvedFactors = [],
        public ?string $otherAbuse = null,
        public ?string $parentsResponse = null,
        public ?string $parentsResponseDate = null,
        public ?string $responseDate = null,
        public ?string $sharedWithAnyoneElse = null,
        public ?string $sharedWithParents = null,
        public ?string $sharedWithParentsWhyNot = null,
        public ?string $sharedWithSocialServices = null,
        public ?string $sharedWithSubject = null,
        public array $sharedWithWho = [],
        public ?string $socialWorkerContacted = null,
        public ?string $subjectsResponse = null,
        public ?string $whyNot = null,
    ) {
    }
}
