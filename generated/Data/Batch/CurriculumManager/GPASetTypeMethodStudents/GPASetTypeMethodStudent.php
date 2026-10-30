<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\CurriculumManager\GPASetTypeMethodStudents;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class GPASetTypeMethodStudent extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $cycleId = null,
        public ?int $gpaMethodId = null,
        public ?int $gpaTypeId = null,
        public ?int $studentId = null,
        public ?string $activeTitle = null,
        public ?string $createdBy = null,
        public ?string $createdByUsername = null,
        public ?CarbonImmutable $createdDateTime = null,
        public ?int $cycle = null,
        public ?string $cycleCode = null,
        public ?int $cycleEndYear = null,
        public ?string $cycleName = null,
        public ?int $cycleStartYear = null,
        public ?string $earnedCredits = null,
        public ?string $failedCredits = null,
        public ?string $gpa = null,
        public ?string $gpaCredits = null,
        public ?int $gpaMethod = null,
        public ?string $gpaMethodCode = null,
        public ?string $gpaMethodName = null,
        public ?int $gpaMethodOrder = null,
        public ?string $gpaPoints = null,
        public ?int $gpaType = null,
        public ?string $gpaTypeCode = null,
        public ?string $gpaTypeName = null,
        public ?int $gpaTypeOrder = null,
        public ?string $guid = null,
        public ?string $statusTitle = null,
        public ?string $student = null,
        public ?string $studentAcademicHouseCode = null,
        public ?string $studentAcademicHouseName = null,
        public ?string $studentBoardingHouseCode = null,
        public ?string $studentBoardingHouseName = null,
        public ?string $studentForename = null,
        public ?string $studentForm = null,
        public ?string $studentFullName = null,
        public ?string $studentSurname = null,
        public ?string $studentYearCode = null,
        public ?string $studentYearName = null,
        public ?int $studentYearNumber = null,
        public ?string $updatedBy = null,
        public ?string $updatedByUsername = null,
        public ?CarbonImmutable $updatedDateTime = null,
    ) {
    }
}
