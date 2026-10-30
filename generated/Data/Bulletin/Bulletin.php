<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Bulletin;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class Bulletin extends Data
{
    protected const LISTS = ['documents' => BulletinDocument::class];

    /**
     * @param  Collection<int, BulletinDocument>  $documents
     */
    public function __construct(
        public ?int $id = null,
        public ?string $author = null,
        public ?string $body = null,
        public ?string $categoryName = null,
        public ?CarbonImmutable $date = null,
        public Collection $documents = new Collection,
        public ?CarbonImmutable $edited = null,
        public ?string $editedBy = null,
        public ?int $groupId = null,
        public ?bool $important = null,
        public ?int $order = null,
        public ?bool $parentPortal = null,
        public ?bool $staffOnly = null,
        public ?bool $studentPortal = null,
        public ?CarbonImmutable $submitted = null,
        public ?string $submittedBy = null,
        public ?string $title = null,
        public ?int $yearGroup = null,
    ) {
    }
}
