<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\AgencyManager\ActiveAgencies;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchData;

readonly class Branch extends BatchData
{
    protected const LISTS = ['contacts' => Contact::class, 'pupils' => Pupil::class, 'visits' => Visit::class];

    /**
     * @param  Collection<int, Contact>  $contacts
     * @param  Collection<int, Pupil>  $pupils
     * @param  Collection<int, Visit>  $visits
     */
    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public ?string $author = null,
        public ?CarbonImmutable $lastUpdated = null,
        public Collection $contacts = new Collection,
        public Collection $pupils = new Collection,
        public Collection $visits = new Collection,
    ) {
    }
}
