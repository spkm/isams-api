<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\SchoolReports\Templates;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchData;

readonly class Template extends BatchData
{
    protected const LISTS = [
        'comments' => Comment::class,
        'gradings' => Grading::class,
        'positions' => Position::class,
        'results' => Result::class,
        'gradebookMarks' => GradebookMark::class,
    ];

    /**
     * @param  Collection<int, Comment>  $comments
     * @param  Collection<int, Grading>  $gradings
     * @param  Collection<int, Position>  $positions
     * @param  Collection<int, Result>  $results
     * @param  Collection<int, GradebookMark>  $gradebookMarks
     */
    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public ?string $description = null,
        public ?string $author = null,
        public ?CarbonImmutable $lastUpdated = null,
        public Collection $comments = new Collection,
        public Collection $gradings = new Collection,
        public Collection $positions = new Collection,
        public Collection $results = new Collection,
        public Collection $gradebookMarks = new Collection,
    ) {
    }
}
