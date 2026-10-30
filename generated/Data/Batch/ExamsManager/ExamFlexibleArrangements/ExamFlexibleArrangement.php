<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\ExamsManager\ExamFlexibleArrangements;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Batch\BatchData;

readonly class ExamFlexibleArrangement extends BatchData
{
    public function __construct(
        public ?int $id = null,
        public ?int $pupilId = null,
        public ?int $authorId = null,
        public ?int $categoryId = null,
        public ?string $categoryName = null,
        public ?string $qualifier = null,
        public ?string $notes = null,
        public ?int $examBoard = null,
        public ?string $examBoardName = null,
        public ?string $examCode = null,
        public ?int $examLevel = null,
        public ?int $amount = null,
        public ?CarbonImmutable $expiryDate = null,
        public ?CarbonImmutable $startDate = null,
        public ?int $subjectId = null,
        public ?string $subjectName = null,
        public ?int $scope = null,
        public ?int $categoryType = null,
        public ?int $examTimetableUniqueId = null,
        public ?int $systemStatus = null,
        public ?CarbonImmutable $lastUpdated = null,
    ) {
    }
}
