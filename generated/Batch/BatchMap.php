<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Batch;

/**
 * Where each Batch API method's records sit in a response, and the model for each root node's records.
 */
final class BatchMap
{
    /** @var array<string, array<string, array{entity: string, model: class-string<\spkm\IsamsApi\Batch\BatchData>|null}>> */
    public const ROOTS = [
        'AgencyManager' => [
            'ActiveAgencies' => ['entity' => 'Agency', 'model' => 'spkm\IsamsApi\Data\Batch\AgencyManager\Agency'],
            'InactiveAgencies' => ['entity' => 'Agency', 'model' => 'spkm\IsamsApi\Data\Batch\AgencyManager\Agency'],
        ],
        'CalendarManager' => [
            'Categories' => [
                'entity' => 'Category',
                'model' => 'spkm\IsamsApi\Data\Batch\CalendarManager\Categories\Category',
            ],
            'Events' => ['entity' => 'Event', 'model' => 'spkm\IsamsApi\Data\Batch\CalendarManager\Event'],
            'EventsNextMonth' => ['entity' => 'Event', 'model' => 'spkm\IsamsApi\Data\Batch\CalendarManager\Event'],
            'EventsNextWeek' => ['entity' => 'Event', 'model' => 'spkm\IsamsApi\Data\Batch\CalendarManager\Event'],
            'EventsNextYear' => ['entity' => 'Event', 'model' => 'spkm\IsamsApi\Data\Batch\CalendarManager\Event'],
            'EventsThisMonth' => ['entity' => 'Event', 'model' => 'spkm\IsamsApi\Data\Batch\CalendarManager\Event'],
            'EventsThisWeek' => ['entity' => 'Event', 'model' => 'spkm\IsamsApi\Data\Batch\CalendarManager\Event'],
            'EventsThisYear' => ['entity' => 'Event', 'model' => 'spkm\IsamsApi\Data\Batch\CalendarManager\Event'],
            'Types' => ['entity' => 'Type', 'model' => 'spkm\IsamsApi\Data\Batch\CalendarManager\Types\Type'],
        ],
        'ControlPanel' => [
            'ContactTypes' => [
                'entity' => 'ContactType',
                'model' => 'spkm\IsamsApi\Data\Batch\ControlPanel\ContactTypes\ContactType',
            ],
            'GlobalLists' => [
                'entity' => 'GlobalList',
                'model' => 'spkm\IsamsApi\Data\Batch\ControlPanel\GlobalLists\GlobalList',
            ],
            'Modules' => ['entity' => 'Groups', 'model' => 'spkm\IsamsApi\Data\Batch\ControlPanel\Modules\Groups'],
            'Permissions' => [
                'entity' => 'Permission',
                'model' => 'spkm\IsamsApi\Data\Batch\ControlPanel\Permissions\Permission',
            ],
            'UserGroups' => ['entity' => 'Group', 'model' => 'spkm\IsamsApi\Data\Batch\ControlPanel\UserGroups\Group'],
            'Users' => ['entity' => 'User', 'model' => 'spkm\IsamsApi\Data\Batch\ControlPanel\Users\User'],
        ],
        'CoverManager' => [
            'AbsenceReasons' => [
                'entity' => 'Reason',
                'model' => 'spkm\IsamsApi\Data\Batch\CoverManager\AbsenceReasons\Reason',
            ],
            'Agencies' => ['entity' => 'Agency', 'model' => 'spkm\IsamsApi\Data\Batch\CoverManager\Agencies\Agency'],
            'CoverStaff' => ['entity' => 'Teacher', 'model' => 'spkm\IsamsApi\Data\Batch\CoverManager\CoverStaff\Teacher'],
            'EventReasons' => ['entity' => 'Reason', 'model' => 'spkm\IsamsApi\Data\Batch\CoverManager\Reason'],
            'LessonSuspensions' => [
                'entity' => 'LessonSuspension',
                'model' => 'spkm\IsamsApi\Data\Batch\CoverManager\LessonSuspensions\LessonSuspension',
            ],
            'RoomClosureReasons' => ['entity' => 'Reason', 'model' => 'spkm\IsamsApi\Data\Batch\CoverManager\Reason'],
            'RoomClosures' => [
                'entity' => 'RoomClosure',
                'model' => 'spkm\IsamsApi\Data\Batch\CoverManager\RoomClosures\RoomClosure',
            ],
            'UnavailableReasons' => ['entity' => 'Reason', 'model' => 'spkm\IsamsApi\Data\Batch\CoverManager\Reason'],
        ],
        'CurriculumManager' => [
            'Blocks' => ['entity' => 'Block', 'model' => 'spkm\IsamsApi\Data\Batch\CurriculumManager\Blocks\Block'],
            'ClassStudents' => [
                'entity' => 'ClassStudent',
                'model' => 'spkm\IsamsApi\Data\Batch\CurriculumManager\ClassStudents\ClassStudent',
            ],
            'Classes' => ['entity' => 'Class', 'model' => 'spkm\IsamsApi\Data\Batch\CurriculumManager\Classes\ClassNode'],
            'CourseCategories' => [
                'entity' => 'CourseCategory',
                'model' => 'spkm\IsamsApi\Data\Batch\CurriculumManager\CourseCategories\CourseCategory',
            ],
            'CourseGPAMethodLevels' => [
                'entity' => 'CourseGPAMethodLevel',
                'model' => 'spkm\IsamsApi\Data\Batch\CurriculumManager\CourseGPAMethodLevels\CourseGPAMethodLevel',
            ],
            'CourseSchedules' => [
                'entity' => 'CourseSchedule',
                'model' => 'spkm\IsamsApi\Data\Batch\CurriculumManager\CourseSchedules\CourseSchedule',
            ],
            'CourseStudents' => [
                'entity' => 'CourseStudent',
                'model' => 'spkm\IsamsApi\Data\Batch\CurriculumManager\CourseStudents\CourseStudent',
            ],
            'Courses' => ['entity' => 'Course', 'model' => 'spkm\IsamsApi\Data\Batch\CurriculumManager\Courses\Course'],
            'CurriculumModels' => [
                'entity' => 'CurriculumModel',
                'model' => 'spkm\IsamsApi\Data\Batch\CurriculumManager\CurriculumModels\CurriculumModel',
            ],
            'Curriculums' => [
                'entity' => 'Curriculum',
                'model' => 'spkm\IsamsApi\Data\Batch\CurriculumManager\Curriculums\Curriculum',
            ],
            'Cycles' => ['entity' => 'Cycle', 'model' => 'spkm\IsamsApi\Data\Batch\CurriculumManager\Cycles\Cycle'],
            'Departments' => [
                'entity' => 'Department',
                'model' => 'spkm\IsamsApi\Data\Batch\CurriculumManager\Departments\Department',
            ],
            'Entities' => ['entity' => 'Entity', 'model' => 'spkm\IsamsApi\Data\Batch\CurriculumManager\Entities\Entity'],
            'GPAGradeMarkPoints' => [
                'entity' => 'GPAGradeMarkPoint',
                'model' => 'spkm\IsamsApi\Data\Batch\CurriculumManager\GPAGradeMarkPoints\GPAGradeMarkPoint',
            ],
            'GPALevels' => [
                'entity' => 'GPALevel',
                'model' => 'spkm\IsamsApi\Data\Batch\CurriculumManager\GPALevels\GPALevel',
            ],
            'GPAMethods' => [
                'entity' => 'GPAMethod',
                'model' => 'spkm\IsamsApi\Data\Batch\CurriculumManager\GPAMethods\GPAMethod',
            ],
            'GPASetTypeMethodStudents' => [
                'entity' => 'GPASetTypeMethodStudent',
                'model' => 'spkm\IsamsApi\Data\Batch\CurriculumManager\GPASetTypeMethodStudents\GPASetTypeMethodStudent',
            ],
            'GPASets' => ['entity' => 'GPASet', 'model' => 'spkm\IsamsApi\Data\Batch\CurriculumManager\GPASets\GPASet'],
            'GPATypeCategories' => [
                'entity' => 'GPATypeCategory',
                'model' => 'spkm\IsamsApi\Data\Batch\CurriculumManager\GPATypeCategories\GPATypeCategory',
            ],
            'GPATypes' => ['entity' => 'GPAType', 'model' => 'spkm\IsamsApi\Data\Batch\CurriculumManager\GPATypes\GPAType'],
            'GradeMarks' => [
                'entity' => 'GradeMark',
                'model' => 'spkm\IsamsApi\Data\Batch\CurriculumManager\GradeMarks\GradeMark',
            ],
            'GradeSets' => [
                'entity' => 'GradeSet',
                'model' => 'spkm\IsamsApi\Data\Batch\CurriculumManager\GradeSets\GradeSet',
            ],
            'GradingPeriods' => [
                'entity' => 'GradingPeriod',
                'model' => 'spkm\IsamsApi\Data\Batch\CurriculumManager\GradingPeriods\GradingPeriod',
            ],
            'GradingSets' => [
                'entity' => 'GradingSet',
                'model' => 'spkm\IsamsApi\Data\Batch\CurriculumManager\GradingSets\GradingSet',
            ],
            'Lengths' => ['entity' => 'Length', 'model' => 'spkm\IsamsApi\Data\Batch\CurriculumManager\Lengths\Length'],
            'Levels' => ['entity' => 'Level', 'model' => 'spkm\IsamsApi\Data\Batch\CurriculumManager\Levels\Level'],
            'Metadata' => [
                'entity' => 'Metadata',
                'model' => 'spkm\IsamsApi\Data\Batch\CurriculumManager\Metadata\Metadata',
            ],
            'Schedules' => [
                'entity' => 'Schedule',
                'model' => 'spkm\IsamsApi\Data\Batch\CurriculumManager\Schedules\Schedule',
            ],
            'StandardItems' => [
                'entity' => 'StandardItem',
                'model' => 'spkm\IsamsApi\Data\Batch\CurriculumManager\StandardItems\StandardItem',
            ],
            'StandardSets' => [
                'entity' => 'StandardSet',
                'model' => 'spkm\IsamsApi\Data\Batch\CurriculumManager\StandardSets\StandardSet',
            ],
            'Subjects' => ['entity' => 'Subject', 'model' => 'spkm\IsamsApi\Data\Batch\CurriculumManager\Subjects\Subject'],
            'TermDates' => [
                'entity' => 'TermDate',
                'model' => 'spkm\IsamsApi\Data\Batch\CurriculumManager\TermDates\TermDate',
            ],
            'TermSets' => ['entity' => 'TermSet', 'model' => 'spkm\IsamsApi\Data\Batch\CurriculumManager\TermSets\TermSet'],
            'TermTypes' => [
                'entity' => 'TermType',
                'model' => 'spkm\IsamsApi\Data\Batch\CurriculumManager\TermTypes\TermType',
            ],
            'Types' => ['entity' => 'Type', 'model' => 'spkm\IsamsApi\Data\Batch\CurriculumManager\Types\Type'],
        ],
        'DailyBulletin' => [
            'Bulletins' => ['entity' => 'Bulletin', 'model' => 'spkm\IsamsApi\Data\Batch\DailyBulletin\Bulletin'],
            'Categories' => [
                'entity' => 'Category',
                'model' => 'spkm\IsamsApi\Data\Batch\DailyBulletin\Categories\Category',
            ],
            'TodaysDailyBulletins' => [
                'entity' => 'Bulletin',
                'model' => 'spkm\IsamsApi\Data\Batch\DailyBulletin\Bulletin',
            ],
            'TomorrowsDailyBulletins' => [
                'entity' => 'Bulletin',
                'model' => 'spkm\IsamsApi\Data\Batch\DailyBulletin\Bulletin',
            ],
        ],
        'DisciplineManager' => [
            'Detentions' => ['entity' => 'Session', 'model' => 'spkm\IsamsApi\Data\Batch\DisciplineManager\Session'],
            'DetentionsThisMonth' => [
                'entity' => 'Session',
                'model' => 'spkm\IsamsApi\Data\Batch\DisciplineManager\Session',
            ],
            'DetentionsThisTerm' => [
                'entity' => 'Session',
                'model' => 'spkm\IsamsApi\Data\Batch\DisciplineManager\Session',
            ],
        ],
        'EstateManager' => [
            'Buildings' => ['entity' => 'Building', 'model' => 'spkm\IsamsApi\Data\Batch\EstateManager\Buildings\Building'],
        ],
        'ExamsManager' => [
            'ExamArrangements' => [
                'entity' => 'ExamArrangement',
                'model' => 'spkm\IsamsApi\Data\Batch\ExamsManager\ExamArrangements\ExamArrangement',
            ],
            'ExamCentres' => [
                'entity' => 'ExamCentre',
                'model' => 'spkm\IsamsApi\Data\Batch\ExamsManager\ExamCentres\ExamCentre',
            ],
            'ExamCycles' => [
                'entity' => 'ExamCycle',
                'model' => 'spkm\IsamsApi\Data\Batch\ExamsManager\ExamCycles\ExamCycle',
            ],
            'ExamEntries' => [
                'entity' => 'ExamEntry',
                'model' => 'spkm\IsamsApi\Data\Batch\ExamsManager\ExamEntries\ExamEntry',
            ],
            'ExamFlexibleArrangements' => [
                'entity' => 'ExamFlexibleArrangement',
                'model' => 'spkm\IsamsApi\Data\Batch\ExamsManager\ExamFlexibleArrangements\ExamFlexibleArrangement',
            ],
            'ExamResults' => [
                'entity' => 'ExamResult',
                'model' => 'spkm\IsamsApi\Data\Batch\ExamsManager\ExamResults\ExamResult',
            ],
            'Qualifications' => [
                'entity' => 'Qualification',
                'model' => 'spkm\IsamsApi\Data\Batch\ExamsManager\Qualifications\Qualification',
            ],
            'UABGroups' => ['entity' => 'UABGroup', 'model' => 'spkm\IsamsApi\Data\Batch\ExamsManager\UABGroups\UABGroup'],
            'UABIdentifiers' => [
                'entity' => 'UABIdentifier',
                'model' => 'spkm\IsamsApi\Data\Batch\ExamsManager\UABIdentifiers\UABIdentifier',
            ],
        ],
        'HRManager' => [
            'CurrentStaff' => [
                'entity' => 'StaffMember',
                'model' => 'spkm\IsamsApi\Data\Batch\HRManager\CurrentStaff\StaffMember',
            ],
        ],
        'InternalExamsManager' => [
            'ExamArrangements' => [
                'entity' => 'ExamArrangement',
                'model' => 'spkm\IsamsApi\Data\Batch\InternalExamsManager\ExamArrangements\ExamArrangement',
            ],
        ],
        'NewsManager' => [
            'ActiveNews' => ['entity' => 'NewsItem', 'model' => 'spkm\IsamsApi\Data\Batch\NewsManager\NewsItem'],
            'ArchivedNews' => ['entity' => 'NewsItem', 'model' => 'spkm\IsamsApi\Data\Batch\NewsManager\NewsItem'],
            'Categories' => ['entity' => 'Category', 'model' => 'spkm\IsamsApi\Data\Batch\NewsManager\Categories\Category'],
            'FutureNews' => ['entity' => 'NewsItem', 'model' => 'spkm\IsamsApi\Data\Batch\NewsManager\NewsItem'],
        ],
        'OffGames' => [
            'OffGamesList' => [
                'entity' => 'OffGames',
                'model' => 'spkm\IsamsApi\Data\Batch\OffGames\OffGamesList\OffGames',
            ],
        ],
        'OtherSchools' => [
            'BoardingTypes' => [
                'entity' => 'BoardingType',
                'model' => 'spkm\IsamsApi\Data\Batch\OtherSchools\BoardingTypes\BoardingType',
            ],
            'GovernanceTypes' => [
                'entity' => 'GovernanceType',
                'model' => 'spkm\IsamsApi\Data\Batch\OtherSchools\GovernanceTypes\GovernanceType',
            ],
            'IntakeTypes' => [
                'entity' => 'IntakeType',
                'model' => 'spkm\IsamsApi\Data\Batch\OtherSchools\IntakeTypes\IntakeType',
            ],
            'SchoolTypes' => [
                'entity' => 'SchoolType',
                'model' => 'spkm\IsamsApi\Data\Batch\OtherSchools\SchoolTypes\SchoolType',
            ],
            'Schools' => ['entity' => 'School', 'model' => 'spkm\IsamsApi\Data\Batch\OtherSchools\Schools\School'],
        ],
        'PupilManager' => [
            'Alumni' => ['entity' => 'Pupil', 'model' => 'spkm\IsamsApi\Data\Batch\PupilManager\Alumni\Pupil'],
            'Applicants' => ['entity' => 'Pupil', 'model' => 'spkm\IsamsApi\Data\Batch\PupilManager\Applicants\Pupil'],
            'Contacts' => ['entity' => 'Contact', 'model' => 'spkm\IsamsApi\Data\Batch\PupilManager\Contacts\Contact'],
            'CurrentPupils' => [
                'entity' => 'Pupil',
                'model' => 'spkm\IsamsApi\Data\Batch\PupilManager\CurrentPupils\Pupil',
            ],
            'CurrentPupilsHealth' => [
                'entity' => 'Pupil',
                'model' => 'spkm\IsamsApi\Data\Batch\PupilManager\CurrentPupilsHealth\Pupil',
            ],
            'CurrentPupilsPassports' => [
                'entity' => 'Pupil',
                'model' => 'spkm\IsamsApi\Data\Batch\PupilManager\CurrentPupilsPassports\Pupil',
            ],
            'CurrentPupilsTransport' => [
                'entity' => 'Pupil',
                'model' => 'spkm\IsamsApi\Data\Batch\PupilManager\CurrentPupilsTransport\Pupil',
            ],
            'CustomGroupCategory' => [
                'entity' => 'Category',
                'model' => 'spkm\IsamsApi\Data\Batch\PupilManager\CustomGroupCategory\Category',
            ],
            'CustomPupilGroupMembershipItems' => [
                'entity' => 'CustomPupilGroupMembershipItem',
                'model' => 'spkm\IsamsApi\Data\Batch\PupilManager\CustomPupilGroupMembershipItems\CustomPupilGroupMembershipItem',
            ],
            'CustomPupilGroups' => [
                'entity' => 'CustomPupilGroup',
                'model' => 'spkm\IsamsApi\Data\Batch\PupilManager\CustomPupilGroups\CustomPupilGroup',
            ],
            'Siblings' => ['entity' => 'Pupil', 'model' => 'spkm\IsamsApi\Data\Batch\PupilManager\Siblings\Pupil'],
        ],
        'PupilRegisters' => [
            'FreeSchoolMeals' => [
                'entity' => 'FreeSchoolMeal',
                'model' => 'spkm\IsamsApi\Data\Batch\PupilRegisters\FreeSchoolMeals\FreeSchoolMeal',
            ],
            'GiftedAndTalentedRegister' => [
                'entity' => 'Register',
                'model' => 'spkm\IsamsApi\Data\Batch\PupilRegisters\GiftedAndTalentedRegister\Register',
            ],
            'SENDfERecords' => [
                'entity' => 'DfERecord',
                'model' => 'spkm\IsamsApi\Data\Batch\PupilRegisters\SENDfERecords\DfERecord',
            ],
            'SENLessons' => ['entity' => 'Lesson', 'model' => 'spkm\IsamsApi\Data\Batch\PupilRegisters\SENLessons\Lesson'],
            'SENRegister' => [
                'entity' => 'Register',
                'model' => 'spkm\IsamsApi\Data\Batch\PupilRegisters\SENRegister\Register',
            ],
            'SENTypes' => ['entity' => 'Type', 'model' => 'spkm\IsamsApi\Data\Batch\PupilRegisters\SENTypes\Type'],
        ],
        'RegistrationManager' => [
            'DatesAndTimes' => [
                'entity' => 'DateTime',
                'model' => 'spkm\IsamsApi\Data\Batch\RegistrationManager\DatesAndTimes\DateTime',
            ],
            'OutOfSchool' => [
                'entity' => 'Pupil',
                'model' => 'spkm\IsamsApi\Data\Batch\RegistrationManager\OutOfSchool\Pupil',
            ],
            'PresentCodes' => [
                'entity' => 'PresentCode',
                'model' => 'spkm\IsamsApi\Data\Batch\RegistrationManager\PresentCodes\PresentCode',
            ],
            'RegistrationCodes' => [
                'entity' => 'RegistrationCode',
                'model' => 'spkm\IsamsApi\Data\Batch\RegistrationManager\RegistrationCodes\RegistrationCode',
            ],
            'RegistrationPeriods' => [
                'entity' => 'RegistrationPeriod',
                'model' => 'spkm\IsamsApi\Data\Batch\RegistrationManager\RegistrationPeriods\RegistrationPeriod',
            ],
            'RegistrationStatuses' => [
                'entity' => 'RegistrationStatus',
                'model' => 'spkm\IsamsApi\Data\Batch\RegistrationManager\RegistrationStatuses\RegistrationStatus',
            ],
        ],
        'RewardsAndConduct' => [
            'Fields' => ['entity' => 'Field', 'model' => 'spkm\IsamsApi\Data\Batch\RewardsAndConduct\Fields\Field'],
            'Records' => ['entity' => 'Record', 'model' => 'spkm\IsamsApi\Data\Batch\RewardsAndConduct\Records\Record'],
            'Types' => ['entity' => 'Type', 'model' => 'spkm\IsamsApi\Data\Batch\RewardsAndConduct\Types\Type'],
        ],
        'SENManager' => [
            'ExternalExams' => ['entity' => 'Exam', 'model' => 'spkm\IsamsApi\Data\Batch\SENManager\ExternalExams\Exam'],
            'GiftedAndTalented' => [
                'entity' => 'Register',
                'model' => 'spkm\IsamsApi\Data\Batch\SENManager\GiftedAndTalented\Register',
            ],
            'InternalExams' => ['entity' => 'Exam', 'model' => 'spkm\IsamsApi\Data\Batch\SENManager\InternalExams\Exam'],
            'Lessons' => ['entity' => 'Lesson', 'model' => 'spkm\IsamsApi\Data\Batch\SENManager\Lessons\Lesson'],
            'Requirements' => ['entity' => 'Type', 'model' => 'spkm\IsamsApi\Data\Batch\SENManager\Requirements\Type'],
            'SEN' => ['entity' => 'Register', 'model' => 'spkm\IsamsApi\Data\Batch\SENManager\SEN\Register'],
        ],
        'SchoolManager' => [
            'AcademicHouses' => ['entity' => 'House', 'model' => 'spkm\IsamsApi\Data\Batch\SchoolManager\House'],
            'BoardingHouses' => ['entity' => 'House', 'model' => 'spkm\IsamsApi\Data\Batch\SchoolManager\House'],
            'Forms' => ['entity' => 'Form', 'model' => 'spkm\IsamsApi\Data\Batch\SchoolManager\Forms\Form'],
            'PastoralTutors' => [
                'entity' => 'StaffMember',
                'model' => 'spkm\IsamsApi\Data\Batch\SchoolManager\PastoralTutors\StaffMember',
            ],
            'SchoolDivisions' => [
                'entity' => 'SchoolDivision',
                'model' => 'spkm\IsamsApi\Data\Batch\SchoolManager\SchoolDivisions\SchoolDivision',
            ],
            'Terms' => ['entity' => 'Term', 'model' => 'spkm\IsamsApi\Data\Batch\SchoolManager\Terms\Term'],
            'Years' => ['entity' => 'Year', 'model' => 'spkm\IsamsApi\Data\Batch\SchoolManager\Years\Year'],
        ],
        'SchoolReports' => [
            'Records' => ['entity' => 'Record', 'model' => 'spkm\IsamsApi\Data\Batch\SchoolReports\Records\Record'],
            'ReportCycles' => [
                'entity' => 'ReportCycle',
                'model' => 'spkm\IsamsApi\Data\Batch\SchoolReports\ReportCycles\ReportCycle',
            ],
            'ReportTypes' => [
                'entity' => 'ReportType',
                'model' => 'spkm\IsamsApi\Data\Batch\SchoolReports\ReportTypes\ReportType',
            ],
            'Templates' => ['entity' => 'Template', 'model' => 'spkm\IsamsApi\Data\Batch\SchoolReports\Templates\Template'],
        ],
        'TeachingManager' => [
            'Departments' => [
                'entity' => 'Department',
                'model' => 'spkm\IsamsApi\Data\Batch\TeachingManager\Departments\Department',
            ],
            'SetLists' => ['entity' => 'SetList', 'model' => 'spkm\IsamsApi\Data\Batch\TeachingManager\SetLists\SetList'],
            'Sets' => ['entity' => 'Set', 'model' => 'spkm\IsamsApi\Data\Batch\TeachingManager\Sets\Set'],
            'TeachingForms' => [
                'entity' => 'TeachingForm',
                'model' => 'spkm\IsamsApi\Data\Batch\TeachingManager\TeachingForms\TeachingForm',
            ],
        ],
        'TimetableManager' => [
            'ArchivedTimetables' => [
                'entity' => 'Timetable',
                'model' => 'spkm\IsamsApi\Data\Batch\TimetableManager\Timetable',
            ],
            'DevelopmentTimetables' => [
                'entity' => 'Timetable',
                'model' => 'spkm\IsamsApi\Data\Batch\TimetableManager\Timetable',
            ],
            'PreliminaryTimetables' => [
                'entity' => 'Timetable',
                'model' => 'spkm\IsamsApi\Data\Batch\TimetableManager\Timetable',
            ],
            'PrepTimetable' => [
                'entity' => 'PrepTimetable',
                'model' => 'spkm\IsamsApi\Data\Batch\TimetableManager\PrepTimetable\PrepTimetable',
            ],
            'PublishedTimetables' => [
                'entity' => 'Timetable',
                'model' => 'spkm\IsamsApi\Data\Batch\TimetableManager\PublishedTimetables\Timetable',
            ],
            'Structure' => ['entity' => 'Week', 'model' => 'spkm\IsamsApi\Data\Batch\TimetableManager\Structure\Week'],
            'Timetable' => ['entity' => 'Pupils', 'model' => 'spkm\IsamsApi\Data\Batch\TimetableManager\Timetable\Pupils'],
            'TimetableAllocations' => [
                'entity' => 'TimetableAllocation',
                'model' => 'spkm\IsamsApi\Data\Batch\TimetableManager\TimetableAllocations\TimetableAllocation',
            ],
        ],
        'TrackingManager' => [
            'ExternalData' => ['entity' => 'Data', 'model' => 'spkm\IsamsApi\Data\Batch\TrackingManager\ExternalData\Data'],
            'ExternalDataList' => [
                'entity' => 'Data',
                'model' => 'spkm\IsamsApi\Data\Batch\TrackingManager\ExternalDataList\Data',
            ],
        ],
    ];

    /** @var array<string, array{string, string}> */
    public const METHODS = [
        'Agent_GetActive' => ['AgencyManager', 'ActiveAgencies'],
        'Agent_GetInactive' => ['AgencyManager', 'InactiveAgencies'],
        'Calendar_GetCategories' => ['CalendarManager', 'Categories'],
        'Calendar_GetEvents' => ['CalendarManager', 'Events'],
        'Calendar_GetEventsNextMonth' => ['CalendarManager', 'EventsNextMonth'],
        'Calendar_GetEventsNextWeek' => ['CalendarManager', 'EventsNextWeek'],
        'Calendar_GetEventsNextYear' => ['CalendarManager', 'EventsNextYear'],
        'Calendar_GetEventsThisMonth' => ['CalendarManager', 'EventsThisMonth'],
        'Calendar_GetEventsThisWeek' => ['CalendarManager', 'EventsThisWeek'],
        'Calendar_GetEventsThisYear' => ['CalendarManager', 'EventsThisYear'],
        'Calendar_GetTypes' => ['CalendarManager', 'Types'],
        'ContactAdvanced_GetContacts' => ['PupilManager', 'Contacts'],
        'ContactAdvanced_GetContactsWithCustomFields' => ['PupilManager', 'Contacts'],
        'ControlPanel_GetAllGlobalLists' => ['ControlPanel', 'GlobalLists'],
        'ControlPanel_GetAllUserGroups' => ['ControlPanel', 'UserGroups'],
        'ControlPanel_GetAllUsers' => ['ControlPanel', 'Users'],
        'ControlPanel_GetContactTypeGlobalList' => ['ControlPanel', 'ContactTypes'],
        'ControlPanel_GetGroupedModules' => ['ControlPanel', 'Modules'],
        'ControlPanel_GetModulePermissions' => ['ControlPanel', 'Permissions'],
        'Cover_GetAllAbsenceReasons' => ['CoverManager', 'AbsenceReasons'],
        'Cover_GetAllAgencies' => ['CoverManager', 'Agencies'],
        'Cover_GetAllCoverStaff' => ['CoverManager', 'CoverStaff'],
        'Cover_GetAllEventReasons' => ['CoverManager', 'EventReasons'],
        'Cover_GetAllLessonSuspensions' => ['CoverManager', 'LessonSuspensions'],
        'Cover_GetAllRoomClosureReasons' => ['CoverManager', 'RoomClosureReasons'],
        'Cover_GetAllRoomClosuresAndCover' => ['CoverManager', 'RoomClosures'],
        'Cover_GetAllUnavailableReasons' => ['CoverManager', 'UnavailableReasons'],
        'DailyBulletin_GetAllCategories' => ['DailyBulletin', 'Categories'],
        'DailyBulletin_GetDailyBulletins' => ['DailyBulletin', 'Bulletins'],
        'DailyBulletin_GetTodaysDailyBulletins' => ['DailyBulletin', 'TodaysDailyBulletins'],
        'DailyBulletin_GetTomorrowsDailyBulletins' => ['DailyBulletin', 'TomorrowsDailyBulletins'],
        'Discipline_GetDetentions' => ['DisciplineManager', 'Detentions'],
        'Discipline_GetDetentionsThisMonth' => ['DisciplineManager', 'DetentionsThisMonth'],
        'Discipline_GetDetentionsThisTerm' => ['DisciplineManager', 'DetentionsThisTerm'],
        'Estate_GetAllBuildingsAndClassrooms' => ['EstateManager', 'Buildings'],
        'ExternalExams_GetExamArrangements' => ['ExamsManager', 'ExamArrangements'],
        'ExternalExams_GetExamCentres' => ['ExamsManager', 'ExamCentres'],
        'ExternalExams_GetExamCycles' => ['ExamsManager', 'ExamCycles'],
        'ExternalExams_GetExamEntries' => ['ExamsManager', 'ExamEntries'],
        'ExternalExams_GetExamResults' => ['ExamsManager', 'ExamResults'],
        'ExternalExams_GetQualifications' => ['ExamsManager', 'Qualifications'],
        'ExternalExams_GetUABGroups' => ['ExamsManager', 'UABGroups'],
        'ExternalExams_GetUABIdentifiers' => ['ExamsManager', 'UABIdentifiers'],
        'HumanResources_GetCurrentStaff' => ['HRManager', 'CurrentStaff'],
        'HumanResources_GetCurrentStaffWithCustomFields' => ['HRManager', 'CurrentStaff'],
        'News_GetActiveNews' => ['NewsManager', 'ActiveNews'],
        'News_GetArchivedNews' => ['NewsManager', 'ArchivedNews'],
        'News_GetFutureNews' => ['NewsManager', 'FutureNews'],
        'News_GetNewsTypes' => ['NewsManager', 'Categories'],
        'OffGames_GetAllOffGames' => ['OffGames', 'OffGamesList'],
        'OtherSchools_BoardingTypes' => ['OtherSchools', 'BoardingTypes'],
        'OtherSchools_GetOtherSchools' => ['OtherSchools', 'Schools'],
        'OtherSchools_GetSchoolTypes' => ['OtherSchools', 'SchoolTypes'],
        'OtherSchools_GovernanceTypes' => ['OtherSchools', 'GovernanceTypes'],
        'OtherSchools_IntakeTypes' => ['OtherSchools', 'IntakeTypes'],
        'PupilRegisters_GetFreeSchoolMeals' => ['PupilRegisters', 'FreeSchoolMeals'],
        'PupilRegisters_GetGiftedAndTalentedRegister' => ['PupilRegisters', 'GiftedAndTalentedRegister'],
        'PupilRegisters_GetSENLessons' => ['PupilRegisters', 'SENLessons'],
        'PupilRegisters_GetSENRegister' => ['PupilRegisters', 'SENRegister'],
        'PupilRegisters_GetSENTypes' => ['PupilRegisters', 'SENTypes'],
        'Pupil_GetAlumni' => ['PupilManager', 'Alumni'],
        'Pupil_GetApplicants' => ['PupilManager', 'Applicants'],
        'Pupil_GetApplicantsWithCustomFields' => ['PupilManager', 'Applicants'],
        'Pupil_GetCurrentPupils' => ['PupilManager', 'CurrentPupils'],
        'Pupil_GetCurrentPupilsHealth' => ['PupilManager', 'CurrentPupilsHealth'],
        'Pupil_GetCurrentPupilsHealthWithCustomFields' => ['PupilManager', 'CurrentPupilsHealth'],
        'Pupil_GetCurrentPupilsTransport' => ['PupilManager', 'CurrentPupilsTransport'],
        'Pupil_GetCurrentPupilsTransportWithCustomFields' => ['PupilManager', 'CurrentPupilsTransport'],
        'Pupil_GetCurrentPupilsWithCustomFields' => ['PupilManager', 'CurrentPupils'],
        'Pupil_GetCustomGroupCategories' => ['PupilManager', 'CustomGroupCategory'],
        'Pupil_GetCustomPupilGroupMembership' => ['PupilManager', 'CustomPupilGroupMembershipItems'],
        'Pupil_GetCustomPupilGroupMembershipFiltered' => ['PupilManager', 'CustomPupilGroupMembershipItems'],
        'Pupil_GetCustomPupilGroups' => ['PupilManager', 'CustomPupilGroups'],
        'Pupil_GetPassports' => ['PupilManager', 'CurrentPupilsPassports'],
        'Pupil_GetSiblings' => ['PupilManager', 'Siblings'],
        'Registration_GetDatesAndTimes' => ['RegistrationManager', 'DatesAndTimes'],
        'Registration_GetOutOfSchoolPupils' => ['RegistrationManager', 'OutOfSchool'],
        'Registration_GetPresentCodes' => ['RegistrationManager', 'PresentCodes'],
        'Registration_GetRegistrationCodes' => ['RegistrationManager', 'RegistrationCodes'],
        'Registration_GetRegistrationPeriods' => ['RegistrationManager', 'RegistrationPeriods'],
        'Registration_GetRegistrationStatus' => ['RegistrationManager', 'RegistrationStatuses'],
        'RewardsAndConduct_GetFields' => ['RewardsAndConduct', 'Fields'],
        'RewardsAndConduct_GetRecords' => ['RewardsAndConduct', 'Records'],
        'RewardsAndConduct_GetRewardsTypes' => ['RewardsAndConduct', 'Types'],
        'SENManager_GetExternalExams' => ['SENManager', 'ExternalExams'],
        'SENManager_GetGiftedAndTalentedRegister' => ['SENManager', 'GiftedAndTalented'],
        'SENManager_GetInternalExams' => ['SENManager', 'InternalExams'],
        'SENManager_GetSENLessons' => ['SENManager', 'Lessons'],
        'SENManager_GetSENRegister' => ['SENManager', 'SEN'],
        'SENManager_GetTypes' => ['SENManager', 'Requirements'],
        'SchoolReports_GetReportCycles' => ['SchoolReports', 'ReportCycles'],
        'SchoolReports_GetReportTypes' => ['SchoolReports', 'ReportTypes'],
        'SchoolReports_GetReports' => ['SchoolReports', 'ReportCycles'],
        'SchoolReports_GetTemplates' => ['SchoolReports', 'Templates'],
        'School_GetAcademicHouses' => ['SchoolManager', 'AcademicHouses'],
        'School_GetAllYears' => ['SchoolManager', 'Years'],
        'School_GetBoardingHouses' => ['SchoolManager', 'BoardingHouses'],
        'School_GetPastoralTutors' => ['SchoolManager', 'PastoralTutors'],
        'School_GetSchoolDivisions' => ['SchoolManager', 'SchoolDivisions'],
        'School_GetSchoolForms' => ['SchoolManager', 'Forms'],
        'School_GetSchoolTerms' => ['SchoolManager', 'Terms'],
        'Teaching_GetDepartmentsAndSubjects' => ['TeachingManager', 'Departments'],
        'Teaching_GetTeachingForms' => ['TeachingManager', 'TeachingForms'],
        'Teaching_GetTeachingSetLists' => ['TeachingManager', 'SetLists'],
        'Teaching_GetTeachingSets' => ['TeachingManager', 'Sets'],
        'Timetable_GetArchivedTimetables' => ['TimetableManager', 'ArchivedTimetables'],
        'Timetable_GetDevelopmentTimetables' => ['TimetableManager', 'DevelopmentTimetables'],
        'Timetable_GetPreliminaryTimetables' => ['TimetableManager', 'PreliminaryTimetables'],
        'Timetable_GetPrepTimetables' => ['TimetableManager', 'PrepTimetable'],
        'Timetable_GetPublishedTimetables' => ['TimetableManager', 'PublishedTimetables'],
        'Timetable_GetPupilTimetables' => ['TimetableManager', 'Timetable'],
        'Timetable_GetTimetableStructure' => ['TimetableManager', 'Structure'],
        'Timetable_GetTimetableWeekAllocations' => ['TimetableManager', 'TimetableAllocations'],
        'Tracking_GetExternalData' => ['TrackingManager', 'ExternalData'],
        'Tracking_GetExternalDataList' => ['TrackingManager', 'ExternalDataList'],
    ];
}
