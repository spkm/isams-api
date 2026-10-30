<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Integrations;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class DocumentSigner extends Data
{
    protected const LISTS = ['signingTabs' => DocumentSignerSigningTab::class];

    /**
     * @param  Collection<int, DocumentSignerSigningTab>  $signingTabs
     */
    public function __construct(
        public ?string $email = null,
        public ?string $name = null,
        public ?int $signerId = null,
        public ?int $signingOrder = null,
        public Collection $signingTabs = new Collection,
    ) {
    }
}
