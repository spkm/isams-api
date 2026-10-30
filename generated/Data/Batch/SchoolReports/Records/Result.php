<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\SchoolReports\Records;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchData;

readonly class Result extends BatchData
{
    protected const LISTS = ['resultsHistory' => HistoricalResult::class];

    /**
     * @param  Collection<int, HistoricalResult>  $resultsHistory
     */
    public function __construct(
        public ?int $id = null,
        public ?int $reportId = null,
        public ?int $resultId = null,
        public ?string $result = null,
        public Collection $resultsHistory = new Collection,
    ) {
    }
}
