<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Integrations;

use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Integrations\Enums\DocumentSignerSigningTabType;

readonly class DocumentSignerSigningTab extends Data
{
    public function __construct(
        public ?string $anchorText = null,
        public ?string $signingTabType = null,
    ) {
    }

    public function signingTabTypeEnum(): ?DocumentSignerSigningTabType
    {
        return DocumentSignerSigningTabType::tryFrom((string) $this->signingTabType);
    }
}
