<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\CloudPortals;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class BookmarkGroups extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?bool $active = null,
        public ?int $bookmarkCount = null,
        public ?string $description = null,
        public ?string $edited = null,
        public ?string $editedBy = null,
        public ?int $execute = null,
        public ?int $groupId = null,
        public ?string $help = null,
        public ?int $hitCount = null,
        public ?string $name = null,
        public ?int $orderIndex = null,
        public ?int $ordinal = null,
        public ?int $popupHeight = null,
        public ?int $popupWidth = null,
        public ?bool $resize = null,
        public ?string $submitBy = null,
        public ?CarbonImmutable $submitDateTime = null,
        public ?string $uri = null,
    ) {
    }
}
