<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Teaching;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\Teaching\Subject;
use spkm\IsamsApi\Data\Teaching\SubjectForCreate;
use spkm\IsamsApi\Data\Teaching\SubjectForUpdate;
use spkm\IsamsApi\Requests\Teaching\Subjects\CreateSubjectRequest;
use spkm\IsamsApi\Requests\Teaching\Subjects\GetSubjectRequest;
use spkm\IsamsApi\Requests\Teaching\Subjects\GetSubjectsRequest;
use spkm\IsamsApi\Requests\Teaching\Subjects\UpdateSubjectRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class SubjectsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Teaching\Subject>
     * @see \spkm\IsamsApi\Requests\Teaching\Subjects\GetSubjectsRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetSubjectsRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\Teaching\SubjectForCreate|array<string, mixed>  $subject
     * @see \spkm\IsamsApi\Requests\Teaching\Subjects\CreateSubjectRequest
     */
    public function create(SubjectForCreate|array $subject): Created
    {
        return $this->fetch(new CreateSubjectRequest(subject: $subject));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Teaching\Subjects\GetSubjectRequest
     */
    public function get(int $id): Subject
    {
        return $this->fetch(new GetSubjectRequest(id: $id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Teaching\SubjectForUpdate|array<string, mixed>  $subject
     * @see \spkm\IsamsApi\Requests\Teaching\Subjects\UpdateSubjectRequest
     */
    public function update(int $id, SubjectForUpdate|array $subject): void
    {
        $this->fetch(new UpdateSubjectRequest(id: $id, subject: $subject));
    }
}
