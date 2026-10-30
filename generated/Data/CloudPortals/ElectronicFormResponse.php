<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\CloudPortals;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class ElectronicFormResponse extends Data
{
    protected const LISTS = ['formItemResponses' => ElectronicFormItemResponse::class];

    /**
     * @param  Collection<int, ElectronicFormItemResponse>  $formItemResponses
     */
    public function __construct(
        public ?int $id = null,
        public ?string $description = null,
        public Collection $formItemResponses = new Collection,
        public ?string $name = null,
        public ?CarbonImmutable $receivedOn = null,
        public ?int $responseDetailsId = null,
        public ?CarbonImmutable $submittedOn = null,
        public ?bool $toBeMarkedReceived = null,
    ) {
    }
}
