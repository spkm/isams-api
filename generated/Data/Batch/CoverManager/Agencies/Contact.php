<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\CoverManager\Agencies;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchData;

readonly class Contact extends BatchData
{
    protected const LISTS = ['emailAddresses' => Email::class, 'phoneNumbers' => Number::class];

    /**
     * @param  Collection<int, Email>  $emailAddresses
     * @param  Collection<int, Number>  $phoneNumbers
     */
    public function __construct(
        public ?int $id = null,
        public ?string $forename = null,
        public ?string $surname = null,
        public ?string $title = null,
        public ?bool $primary = null,
        public ?string $author = null,
        public ?CarbonImmutable $lastUpdated = null,
        public Collection $emailAddresses = new Collection,
        public Collection $phoneNumbers = new Collection,
    ) {
    }
}
