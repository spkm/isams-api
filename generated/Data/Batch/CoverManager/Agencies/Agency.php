<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\CoverManager\Agencies;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchData;

readonly class Agency extends BatchData
{
    protected const LISTS = ['contacts' => Contact::class, 'staff' => Teacher::class];

    /**
     * @param  Collection<int, Contact>  $contacts
     * @param  Collection<int, Teacher>  $staff
     */
    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public ?string $code = null,
        public ?string $notes = null,
        public ?bool $active = null,
        public ?bool $preferred = null,
        public ?string $address1 = null,
        public ?string $address2 = null,
        public ?string $address3 = null,
        public ?string $town = null,
        public ?string $county = null,
        public ?string $country = null,
        public ?string $postcode = null,
        public ?string $author = null,
        public ?CarbonImmutable $lastUpdated = null,
        public Collection $contacts = new Collection,
        public Collection $staff = new Collection,
    ) {
    }
}
