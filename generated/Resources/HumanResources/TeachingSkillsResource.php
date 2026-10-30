<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\HumanResources\CreateTeachingSkillCommandForCreate;
use spkm\IsamsApi\Requests\HumanResources\TeachingSkills\CreateTeachingSkillRequest;
use spkm\IsamsApi\Requests\HumanResources\TeachingSkills\DeleteTeachingSkillRequest;
use spkm\IsamsApi\Requests\HumanResources\TeachingSkills\GetTeachingSkillRequest;
use spkm\IsamsApi\Requests\HumanResources\TeachingSkills\GetTeachingSkillsRequest;
use spkm\IsamsApi\Requests\HumanResources\TeachingSkills\PatchTeachingSkillRequest;
use spkm\IsamsApi\Support\JsonPatch;

class TeachingSkillsResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\CreateTeachingSkillCommandForCreate|array<string, mixed>  $command
     */
    public function createTeachingSkill(CreateTeachingSkillCommandForCreate|array $command): Response
    {
        return $this->connector->send(new CreateTeachingSkillRequest($command));
    }

    public function deleteTeachingSkill(int $id): Response
    {
        return $this->connector->send(new DeleteTeachingSkillRequest($id));
    }

    public function getTeachingSkill(int $id): Response
    {
        return $this->connector->send(new GetTeachingSkillRequest($id));
    }

    public function getTeachingSkills(): Response
    {
        return $this->connector->send(new GetTeachingSkillsRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patchTeachingSkill(int $id, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchTeachingSkillRequest($id, $patch));
    }
}
