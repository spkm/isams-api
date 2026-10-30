<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\SchoolReports\Records;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchData;

readonly class GradebookMark extends BatchData
{
    protected const LISTS = ['gradebookMarksHistory' => HistoricalGradebookMark::class];

    /**
     * @param  Collection<int, HistoricalGradebookMark>  $gradebookMarksHistory
     */
    public function __construct(
        public ?int $id = null,
        public ?int $reportId = null,
        public ?int $elementId = null,
        public ?string $mark = null,
        public Collection $gradebookMarksHistory = new Collection,
    ) {
    }
}
