<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Timetable;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class TimetableImportResult extends Data
{
    protected const LISTS = [
        'conflictResolution' => TimetableImportResultItem::class,
        'failures' => TimetableImportResultItem::class,
        'lessonsImported' => TimetableImportResultItem::class,
        'nonClassDataImported' => TimetableImportResultItem::class,
        'summary' => TimetableImportResultItem::class,
    ];

    /**
     * @param  Collection<int, TimetableImportResultItem>  $conflictResolution
     * @param  Collection<int, TimetableImportResultItem>  $failures
     * @param  Collection<int, TimetableImportResultItem>  $lessonsImported
     * @param  Collection<int, TimetableImportResultItem>  $nonClassDataImported
     * @param  Collection<int, TimetableImportResultItem>  $summary
     */
    public function __construct(
        public Collection $conflictResolution = new Collection,
        public Collection $failures = new Collection,
        public ?int $importId = null,
        public Collection $lessonsImported = new Collection,
        public Collection $nonClassDataImported = new Collection,
        public Collection $summary = new Collection,
        public ?int $timetableId = null,
    ) {
    }
}
