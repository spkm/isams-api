<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\WellbeingManager;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class Workflow extends Data
{
    protected const LISTS = [
        'actions' => WorkflowAction::class,
        'rules' => WorkflowRule::class,
        'students' => WorkflowStudent::class,
    ];

    /**
     * @param  Collection<int, WorkflowAction>  $actions
     * @param  Collection<int, WorkflowRule>  $rules
     * @param  Collection<int, WorkflowStudent>  $students
     */
    public function __construct(
        public ?int $id = null,
        public Collection $actions = new Collection,
        public ?bool $enabled = null,
        public ?int $interval = null,
        public ?CarbonImmutable $lastUpdated = null,
        public ?string $lastUpdatedBy = null,
        public ?string $name = null,
        public Collection $rules = new Collection,
        public ?CarbonImmutable $startDate = null,
        public ?WorkflowStudentFilter $studentFilter = null,
        public Collection $students = new Collection,
    ) {
    }
}
