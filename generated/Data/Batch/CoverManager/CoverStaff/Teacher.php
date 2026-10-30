<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\CoverManager\CoverStaff;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchData;

readonly class Teacher extends BatchData
{
    protected const LISTS = [
        'constraints' => Constraint::class,
        'parameters' => Parameter::class,
        'protections' => Protection::class,
        'statistics' => Statistic::class,
    ];

    /**
     * @param  Collection<int, Constraint>  $constraints
     * @param  Collection<int, Parameter>  $parameters
     * @param  Collection<int, Protection>  $protections
     * @param  Collection<int, Statistic>  $statistics
     */
    public function __construct(
        public ?int $id = null,
        public ?string $teacherCode = null,
        public ?bool $cover = null,
        public ?bool $suspend = null,
        public ?int $maxDay = null,
        public ?int $maxWeek = null,
        public ?string $note = null,
        public ?string $author = null,
        public ?CarbonImmutable $lastUpdated = null,
        public Collection $constraints = new Collection,
        public Collection $parameters = new Collection,
        public Collection $protections = new Collection,
        public Collection $statistics = new Collection,
    ) {
    }
}
