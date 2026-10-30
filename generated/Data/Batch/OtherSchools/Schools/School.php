<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\OtherSchools\Schools;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchData;

readonly class School extends BatchData
{
    protected const LISTS = ['contacts' => Contact::class, 'notes' => Note::class, 'visits' => Visit::class];

    /**
     * @param  Collection<int, Contact>  $contacts
     * @param  Collection<int, Note>  $notes
     * @param  Collection<int, Visit>  $visits
     */
    public function __construct(
        public ?int $id = null,
        public ?string $code = null,
        public ?string $name = null,
        public ?string $schoolWebsite = null,
        public ?string $schoolEmail = null,
        public ?string $headmaster = null,
        public ?string $deputyHeadmaster = null,
        public ?string $registrar = null,
        public ?string $address1 = null,
        public ?string $address2 = null,
        public ?string $address3 = null,
        public ?string $town = null,
        public ?string $county = null,
        public ?string $postcode = null,
        public ?string $country = null,
        public Collection $contacts = new Collection,
        public Collection $notes = new Collection,
        public Collection $visits = new Collection,
    ) {
    }
}
