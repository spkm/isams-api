<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Reports;

use Carbon\CarbonImmutable;
use spkm\IsamsApi\Data\Data;

readonly class Report extends Data
{
    public function __construct(
        public ?int $id = null,
        public ?int $active = null,
        public ?bool $download = null,
        public ?CarbonImmutable $endDate = null,
        public ?int $inIsams = null,
        public ?int $inParentPortal = null,
        public ?int $inStudentPortal = null,
        public ?int $previousCycle = null,
        public ?bool $primaryTeacherOnly = null,
        public ?int $printingProfile = null,
        public ?CarbonImmutable $publishedOn = null,
        public ?int $reportCount = null,
        public ?int $reportCountPublished = null,
        public ?string $reportName = null,
        public ?int $reportsProfile = null,
        public ?int $reportTerm = null,
        public ?int $reportYear = null,
        public ?string $schoolId = null,
        public ?string $shortName = null,
        public ?CarbonImmutable $startDate = null,
        public ?string $submittedBy = null,
        public ?CarbonImmutable $submittedOn = null,
        public ?string $termName = null,
        public ?string $trackingName = null,
        public ?int $type = null,
        public ?bool $upload = null,
    ) {
    }
}
