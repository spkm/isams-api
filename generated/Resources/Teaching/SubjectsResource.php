<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Teaching;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\Teaching\SubjectForCreate;
use spkm\IsamsApi\Data\Teaching\SubjectForUpdate;
use spkm\IsamsApi\Requests\Teaching\Subjects\CreateSubjectRequest;
use spkm\IsamsApi\Requests\Teaching\Subjects\GetSubjectRequest;
use spkm\IsamsApi\Requests\Teaching\Subjects\GetSubjectsRequest;
use spkm\IsamsApi\Requests\Teaching\Subjects\UpdateSubjectRequest;

class SubjectsResource extends BaseResource
{
    public function all(): Response
    {
        return $this->connector->send(new GetSubjectsRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\Teaching\SubjectForCreate|array<string, mixed>  $subject
     */
    public function create(SubjectForCreate|array $subject): Response
    {
        return $this->connector->send(new CreateSubjectRequest($subject));
    }

    public function get(int $id): Response
    {
        return $this->connector->send(new GetSubjectRequest($id));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Teaching\SubjectForUpdate|array<string, mixed>  $subject
     */
    public function update(int $id, SubjectForUpdate|array $subject): Response
    {
        return $this->connector->send(new UpdateSubjectRequest($id, $subject));
    }
}
