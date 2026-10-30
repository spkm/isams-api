<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class PortalExamArrangement extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?int $amount = null,
        public ?string $arrangementNotes = null,
        public ?int $categoryId = null,
        public ?string $categoryName = null,
        public ?int $categoryType = null,
        public ?string $examBoard = null,
        public ?string $examBoardName = null,
        public ?string $examCode = null,
        public ?string $examLevel = null,
        public ?CarbonImmutable $expiryDate = null,
        public ?string $qualifier = null,
        public ?int $scope = null,
        public ?int $subjectId = null,
        public ?string $subjectName = null,
    ) {
    }
}
