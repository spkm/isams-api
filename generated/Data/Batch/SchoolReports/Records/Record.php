<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\SchoolReports\Records;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchData;

readonly class Record extends BatchData
{
    protected const LISTS = [
        'stores' => Store::class,
        'comments' => Comment::class,
        'grades' => Grade::class,
        'positions' => Position::class,
        'results' => Result::class,
        'gradebookMarks' => GradebookMark::class,
    ];

    /**
     * @param  Collection<int, Store>  $stores
     * @param  Collection<int, Comment>  $comments
     * @param  Collection<int, Grade>  $grades
     * @param  Collection<int, Position>  $positions
     * @param  Collection<int, Result>  $results
     * @param  Collection<int, GradebookMark>  $gradebookMarks
     */
    public function __construct(
        public ?int $id = null,
        public ?int $authorId = null,
        public ?int $type = null,
        public ?string $reportName = null,
        public ?string $trackingName = null,
        public ?string $shortName = null,
        public ?int $previousCycle = null,
        public ?CarbonImmutable $startReports = null,
        public ?CarbonImmutable $finishReports = null,
        public ?CarbonImmutable $printReports = null,
        public ?int $year = null,
        public ?int $term = null,
        public ?int $profile = null,
        public ?int $printingProfile = null,
        public ?bool $active = null,
        public ?bool $primaryTeacherOnly = null,
        public ?bool $download = null,
        public ?bool $upload = null,
        public ?string $author = null,
        public ?CarbonImmutable $lastUpdated = null,
        public Collection $stores = new Collection,
        public Collection $comments = new Collection,
        public Collection $grades = new Collection,
        public Collection $positions = new Collection,
        public Collection $results = new Collection,
        public Collection $gradebookMarks = new Collection,
    ) {
    }
}
