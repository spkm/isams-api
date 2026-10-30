<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\SchoolReports\ReportCycles;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchData;

readonly class ReportCycle extends BatchData
{
    protected const LISTS = ['reports' => Report::class, 'generalComments' => GeneralComment::class];

    /**
     * @param  Collection<int, Report>  $reports
     * @param  Collection<int, GeneralComment>  $generalComments
     */
    public function __construct(
        public ?int $id = null,
        public ?int $authorId = null,
        public ?string $cycleName = null,
        public ?string $trackingName = null,
        public ?string $shortName = null,
        public ?int $reportYear = null,
        public ?int $reportTerm = null,
        public ?int $reportCycleType = null,
        public ?int $previousReportCycle = null,
        public ?bool $active = null,
        public ?CarbonImmutable $startDate = null,
        public ?CarbonImmutable $endDate = null,
        public ?CarbonImmutable $printDate = null,
        public ?CarbonImmutable $lastUpdated = null,
        public Collection $reports = new Collection,
        public Collection $generalComments = new Collection,
    ) {
    }
}
