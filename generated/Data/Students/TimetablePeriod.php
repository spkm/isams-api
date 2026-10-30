<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use spkm\IsamsApi\Data\Data;

readonly class TimetablePeriod extends Data
{
    public function __construct(
        public ?string $assTeachers = null,
        public ?string $buildingInitials = null,
        public ?string $buildingName = null,
        public ?string $classCode = null,
        public ?string $classInitials = null,
        public ?string $className = null,
        public ?string $comeFrom = null,
        public ?int $period = null,
        public ?string $scheduleCode = null,
        public ?int $scheduleExceptionsId = null,
        public ?int $scheduleId = null,
        public ?int $set = null,
        public ?string $setBlock = null,
        public ?string $setName = null,
        public ?string $setNumber = null,
        public ?string $staffEmailAddress = null,
        public ?string $staffFirstName = null,
        public ?string $staffFullname = null,
        public ?string $staffInitials = null,
        public ?string $staffSalutation = null,
        public ?string $staffSurname = null,
        public ?string $subject = null,
        public ?string $subjectCode = null,
        public ?string $subjectHOD = null,
        public ?int $year = null,
        public ?string $yearCode = null,
        public ?string $yearName = null,
    ) {
    }
}
