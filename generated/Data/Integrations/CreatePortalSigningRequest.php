<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Integrations;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class CreatePortalSigningRequest extends Data
{
    protected const LISTS = ['signers' => DocumentSigner::class];

    /**
     * @param  Collection<int, DocumentSigner>  $signers
     */
    public function __construct(
        public ?int $areaId = null,
        public ?string $createdBy = null,
        public ?string $documentDescription = null,
        public ?string $documentGuid = null,
        public ?string $documentName = null,
        public ?int $documentTypeId = null,
        public ?string $emailBody = null,
        public ?string $emailSubject = null,
        public ?string $legacyPath = null,
        public Collection $signers = new Collection,
    ) {
    }
}
