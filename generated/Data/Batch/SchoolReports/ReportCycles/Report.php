<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\SchoolReports\ReportCycles;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchData;

readonly class Report extends BatchData
{
    protected const LISTS = [
        'comments' => Comment::class,
        'grades' => Grade::class,
        'positions' => Position::class,
        'results' => Result::class,
        'gradebookMarks' => GradebookMark::class,
    ];

    /**
     * @param  Collection<int, Comment>  $comments
     * @param  Collection<int, Grade>  $grades
     * @param  Collection<int, Position>  $positions
     * @param  Collection<int, Result>  $results
     * @param  Collection<int, GradebookMark>  $gradebookMarks
     */
    public function __construct(
        public ?int $id = null,
        public ?int $authorId = null,
        public ?int $templateId = null,
        public ?int $associatedEntityId = null,
        public ?int $type = null,
        public ?string $associatedEntityName = null,
        public ?string $associatedSubEntityId = null,
        public ?int $status = null,
        public ?string $schoolId = null,
        public ?int $ncYear = null,
        public ?int $version = null,
        public ?string $author = null,
        public ?CarbonImmutable $lastUpdated = null,
        public Collection $comments = new Collection,
        public Collection $grades = new Collection,
        public Collection $positions = new Collection,
        public Collection $results = new Collection,
        public Collection $gradebookMarks = new Collection,
    ) {
    }
}
