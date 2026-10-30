<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\CurriculumManager\ClassStudents;

use spkm\IsamsApi\Batch\BatchData;

readonly class ClassStudent extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $classId = null,
        public ?int $courseId = null,
        public ?int $courseStudentId = null,
        public ?int $courseStudentStatusId = null,
        public ?int $scheduleId = null,
        public ?int $studentId = null,
        public ?int $class = null,
        public ?string $classCode = null,
        public ?string $classDescription = null,
        public ?string $classEmailAddress = null,
        public ?string $className = null,
        public ?string $classNumber = null,
        public ?string $classWebsite = null,
        public ?int $course = null,
        public ?string $courseCode = null,
        public ?string $courseName = null,
        public ?int $courseSchedule = null,
        public ?int $courseStudent = null,
        public ?string $courseStudentComputedCredit = null,
        public ?int $courseStudentComputedMark = null,
        public ?string $courseStudentCredit = null,
        public ?int $courseStudentGradeMark = null,
        public ?string $courseStudentGradeMarkCode = null,
        public ?string $courseStudentGradeMarkName = null,
        public ?int $courseStudentGradeSetMark = null,
        public ?bool $courseStudentManualCredit = null,
        public ?bool $courseStudentManualMark = null,
        public ?int $courseStudentMark = null,
        public ?string $courseStudentNotes = null,
        public ?int $courseStudentStatus = null,
        public ?string $courseStudentStatusCode = null,
        public ?string $courseStudentStatusName = null,
        public ?string $courseStudentStatusType = null,
        public ?int $curriculumStudent = null,
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
