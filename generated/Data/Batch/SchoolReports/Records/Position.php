<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\SchoolReports\Records;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchData;

readonly class Position extends BatchData
{
    protected const LISTS = ['positionHistory' => HistoricalPosition::class];

    /**
     * @param  Collection<int, HistoricalPosition>  $positionHistory
     */
    public function __construct(
        public ?int $id = null,
        public ?int $reportId = null,
        public ?int $positionId = null,
        public ?string $position = null,
        public Collection $positionHistory = new Collection,
    ) {
    }
}
