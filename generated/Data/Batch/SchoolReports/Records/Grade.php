<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\SchoolReports\Records;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchData;

readonly class Grade extends BatchData
{
    protected const LISTS = ['gradeHistory' => HistoricalGrade::class];

    /**
     * @param  Collection<int, HistoricalGrade>  $gradeHistory
     */
    public function __construct(
        public ?int $id = null,
        public ?int $reportId = null,
        public ?int $gradeId = null,
        public ?string $grade = null,
        public ?string $templateName = null,
        public Collection $gradeHistory = new Collection,
    ) {
    }
}
