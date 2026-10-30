<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Bulletin;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class BulletinForCreate extends Data
{
    public function __construct(
        public ?string $author = null,
        public ?string $body = null,
        public ?CarbonImmutable $endDate = null,
        public ?int $groupId = null,
        public ?bool $important = null,
        public ?int $order = null,
        public ?bool $parentPortal = null,
        public ?bool $staffOnly = null,
        public ?CarbonImmutable $startDate = null,
        public ?bool $studentPortal = null,
        public ?string $title = null,
    ) {
    }
}
