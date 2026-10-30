<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\ExamsManager\ExamResults;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class ExamResult extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $pupilId = null,
        public ?int $cycleId = null,
        public ?int $authorId = null,
        public ?int $resultTypeId = null,
        public ?string $resultType = null,
        public ?int $previousResultId = null,
        public ?int $pupilStatus = null,
        public ?string $surname = null,
        public ?string $forename = null,
        public ?string $candidateSurname = null,
        public ?string $candidateForenames = null,
        public ?string $uci = null,
        public ?string $candidateNumber = null,
        public ?int $takenInNCYear = null,
        public ?string $optionCode = null,
        public ?string $optionTitle = null,
        public ?string $optionAbbreviation = null,
        public ?int $optionOrder = null,
        public ?string $uabCode = null,
        public ?string $uabName = null,
        public ?string $certificationType = null,
        public ?string $qualification = null,
        public ?string $qualificationLevel = null,
        public ?int $programmeId = null,
        public ?string $programme = null,
        public ?int $programmeOrder = null,
        public ?string $subject = null,
        public ?string $resultGradeset = null,
        public ?string $firstGrade = null,
        public ?string $firstGradeEndorsement = null,
        public ?string $ums = null,
        public ?string $uniformGrade = null,
        public ?string $maxMark = null,
        public ?bool $publishedToiSAMS = null,
        public ?bool $publishedToStudentPortal = null,
        public ?bool $publishedToParentPortal = null,
        public ?CarbonImmutable $lastUpdated = null,
    ) {
    }
}
