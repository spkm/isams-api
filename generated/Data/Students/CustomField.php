<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Students\Enums\CustomFieldInputType;

readonly class CustomField extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?string $area = null,
        public ?string $defaultValue = null,
        public ?string $inputType = null,
        public ?string $name = null,
        public ?string $section = null,
        public ?bool $supportsMultipleListItems = null,
        public ?string $systemConfigurationListName = null,
        public ?string $value = null,
    ) {
    }

    public function inputTypeEnum(): ?CustomFieldInputType
    {
        return CustomFieldInputType::tryFrom((string) $this->inputType);
    }
}
