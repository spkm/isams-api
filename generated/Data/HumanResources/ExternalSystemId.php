<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\HumanResources;

use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\Enums\ExternalSystemIdEntityType;

readonly class ExternalSystemId extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $entityType = null,
        public ?string $externalId = null,
        public ?string $externalSystemKey = null,
        public ?string $internalId = null,
    ) {
    }

    public function entityTypeEnum(): ?ExternalSystemIdEntityType
    {
        return ExternalSystemIdEntityType::tryFrom((string) $this->entityType);
    }
}
