<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\ExamsManager\ExamEntries;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class ExamEntry extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $pupilId = null,
        public ?int $cycleId = null,
        public ?int $programmeId = null,
        public ?int $componentId = null,
        public ?int $authorId = null,
        public ?string $boardCode = null,
        public ?string $board = null,
        public ?string $programme = null,
        public ?string $optionCode = null,
        public ?string $optionTitle = null,
        public ?string $subject = null,
        public ?string $componentCode = null,
        public ?string $componentTitle = null,
        public ?string $timetabled = null,
        public ?string $timetableSession = null,
        public ?string $duration = null,
        public ?string $qualification = null,
        public ?string $qualificationLevel = null,
        public ?string $surname = null,
        public ?string $forename = null,
        public ?string $candidateSurname = null,
        public ?string $candidateForenames = null,
        public ?CarbonImmutable $dateOfBirth = null,
        public ?string $candidateNumber = null,
        public ?string $uci = null,
        public ?string $form = null,
        public ?int $ncYear = null,
        public ?string $academicHouse = null,
        public ?string $boardingHouse = null,
        public ?int $systemStatus = null,
        public ?int $timeAllowed = null,
        public ?CarbonImmutable $examStart = null,
        public ?CarbonImmutable $examEnd = null,
        public ?string $location = null,
        public ?CarbonImmutable $lastUpdated = null,
        public ?string $editor = null,
    ) {
    }
}
