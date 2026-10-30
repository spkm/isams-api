<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\CloudPortals;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class Folder extends Data
{
    protected const LISTS = ['documents' => Document::class];

    /**
     * @param  Collection<int, Document>  $documents
     */
    public function __construct(
        public Collection $documents = new Collection,
        public ?int $folderId = null,
        public ?string $folderName = null,
        public ?int $order = null,
        public ?int $parentFolderId = null,
        public ?CarbonImmutable $submitDateTime = null,
    ) {
    }
}
