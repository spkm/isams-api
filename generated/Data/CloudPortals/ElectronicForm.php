<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\CloudPortals;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class ElectronicForm extends Data
{
    protected const LISTS = ['formItems' => ElectronicFormItem::class];

    /**
     * @param  Collection<int, ElectronicFormItem>  $formItems
     */
    public function __construct(
        public ?int $id = null,
        public ?string $completionMessage = null,
        public ?string $description = null,
        public ?bool $emailConfirmation = null,
        public Collection $formItems = new Collection,
        public ?string $name = null,
        public ?bool $toBeMarkedReceived = null,
    ) {
    }
}
