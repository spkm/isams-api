<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\PupilManager\CurrentPupilsPassports;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class Passport extends BatchData
{
    public function __construct(
        public ?string $passportNumber = null,
        public ?string $type = null,
        public ?string $nationality = null,
        public ?string $placeOfIssue = null,
        public ?CarbonImmutable $dateOfIssue = null,
        public ?CarbonImmutable $expiryDate = null,
        public ?string $placeOfBirth = null,
        public ?string $author = null,
        public ?CarbonImmutable $lastUpdated = null,
    ) {
    }
}
