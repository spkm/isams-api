<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\WellbeingManager;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class WorkflowForCreate extends Data
{
    protected const LISTS = [
        'actions' => WorkflowAction::class,
        'rules' => WorkflowRule::class,
        'students' => WorkflowStudent::class,
    ];

    /**
     * @param  Collection<int, WorkflowAction>|null  $actions
     * @param  Collection<int, WorkflowRule>|null  $rules
     * @param  Collection<int, WorkflowStudent>|null  $students
     */
    public function __construct(
        public bool $enabled,
        public string $name,
        public ?int $id = null,
        public ?Collection $actions = null,
        public ?bool $filter = null,
        public ?int $interval = null,
        public ?Collection $rules = null,
        public ?CarbonImmutable $startDate = null,
        public ?WorkflowStudentFilter $studentFilter = null,
        public ?Collection $students = null,
    ) {
    }
}
