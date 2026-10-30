<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\PupilManager\Contacts;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchData;

readonly class Contact extends BatchData
{
    protected const LISTS = [
        'pupils' => Pupil::class,
        'addressGroups' => AddressGroup::class,
        'customFields' => CustomField::class,
    ];

    /**
     * @param  Collection<int, Pupil>  $pupils
     * @param  Collection<int, AddressGroup>  $addressGroups
     * @param  Collection<int, CustomField>  $customFields
     */
    public function __construct(
        public ?int $id = null,
        public ?int $authorId = null,
        public ?int $personId = null,
        public ?string $personGuid = null,
        public ?bool $isFirstPersonContact = null,
        public ?string $title = null,
        public ?string $forename = null,
        public ?string $middleNames = null,
        public ?string $surname = null,
        public ?Address $address = null,
        public ?bool $private = null,
        public ?string $relationship = null,
        public ?string $relationshipRaw = null,
        public ?string $parentalResponsibility = null,
        public ?string $parentalResponsibilityContactType = null,
        public ?string $emailAddress = null,
        public ?string $mobile = null,
        public ?string $telephone = null,
        public ?string $profession = null,
        public ?string $accountCode = null,
        public ?string $author = null,
        public ?bool $canShare = null,
        public ?bool $studentHome = null,
        public ?CarbonImmutable $lastUpdated = null,
        public ?bool $justContact = null,
        public ?bool $mailMergeAll = null,
        public ?bool $billingMailMerge = null,
        public ?bool $correspondenceMailMerge = null,
        public ?bool $reportsMailMerge = null,
        public ?string $sos = null,
        public ?int $order = null,
        public ?string $preferredLanguage = null,
        public ?string $billingEmailAddress = null,
        public Collection $pupils = new Collection,
        public Collection $addressGroups = new Collection,
        public Collection $customFields = new Collection,
    ) {
    }
}
