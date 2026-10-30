<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\CurriculumManager\CourseStudents;

use spkm\IsamsApi\Batch\BatchData;

readonly class CourseStudent extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $classId = null,
        public ?int $courseId = null,
        public ?int $courseStudentStatusId = null,
        public ?int $gradeMarkId = null,
        public ?int $scheduleId = null,
        public ?int $studentId = null,
        public ?int $class = null,
        public ?string $classCode = null,
        public ?string $className = null,
        public ?string $computedCredit = null,
        public ?int $computedMark = null,
        public ?int $course = null,
        public ?string $courseCode = null,
        public ?string $courseName = null,
        public ?int $courseSchedule = null,
        public ?int $courseStudentStatus = null,
        public ?string $courseStudentStatusCode = null,
        public ?string $courseStudentStatusName = null,
        public ?string $courseStudentStatusType = null,
        public ?string $credit = null,
        public ?int $curriculumStudent = null,
        public ?int $gradeMark = null,
        public ?string $gradeMarkCode = null,
        public ?string $gradeMarkName = null,
        public ?int $gradeSetMark = null,
        public ?bool $manualCredit = null,
        public ?bool $manualMark = null,
        public ?int $mark = null,
        public ?string $notes = null,
        public ?int $schedule = null,
        public ?string $scheduleCode = null,
        public ?string $scheduleName = null,
        public ?string $student = null,
        public ?string $studentAcademicHouseCode = null,
        public ?string $studentAcademicHouseName = null,
        public ?string $studentBoardingHouseCode = null,
        public ?string $studentBoardingHouseName = null,
        public ?string $studentForename = null,
        public ?string $studentForm = null,
        public ?string $studentFullName = null,
        public ?string $studentGender = null,
        public ?string $studentGenderTitle = null,
        public ?string $studentSurname = null,
        public ?string $studentYearCode = null,
        public ?string $studentYearName = null,
        public ?int $studentYearNumber = null,
    ) {
    }
}
