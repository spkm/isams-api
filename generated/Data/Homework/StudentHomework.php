<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Homework;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Homework\Enums\StudentHomeworkSubmissionStatus;

readonly class StudentHomework extends Data
{
    protected const LISTS = ['tags' => Tag::class];

    /**
     * @param  Collection<int, Tag>  $tags
     */
    public function __construct(
        public ?int $id = null,
        public ?string $description = null,
        public ?CarbonImmutable $dueDate = null,
        public ?int $durationMinutes = null,
        public ?string $feedbackMark = null,
        public ?string $forename = null,
        public ?int $homeworkId = null,
        public ?string $preferredSurname = null,
        public ?string $schoolId = null,
        public ?string $setBy = null,
        public ?string $setByForename = null,
        public ?string $setBySurname = null,
        public ?string $submissionStatus = null,
        public ?string $surname = null,
        public Collection $tags = new Collection,
        public ?string $title = null,
    ) {
    }

    public function submissionStatusEnum(): ?StudentHomeworkSubmissionStatus
    {
        return StudentHomeworkSubmissionStatus::tryFrom((string) $this->submissionStatus);
    }
}
