<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\HumanResources\TeachingSkillForCreate;
use spkm\IsamsApi\Requests\HumanResources\TeachingSkills\CreateTeachingSkillRequest;
use spkm\IsamsApi\Requests\HumanResources\TeachingSkills\DeleteTeachingSkillRequest;
use spkm\IsamsApi\Requests\HumanResources\TeachingSkills\GetTeachingSkillRequest;
use spkm\IsamsApi\Requests\HumanResources\TeachingSkills\GetTeachingSkillsRequest;
use spkm\IsamsApi\Requests\HumanResources\TeachingSkills\PatchTeachingSkillRequest;
use spkm\IsamsApi\Support\JsonPatch;

class TeachingSkillsResource extends BaseResource
{
    public function all(): Response
    {
        return $this->connector->send(new GetTeachingSkillsRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\TeachingSkillForCreate|array<string, mixed>  $teachingSkill
     */
    public function create(TeachingSkillForCreate|array $teachingSkill): Response
    {
        return $this->connector->send(new CreateTeachingSkillRequest($teachingSkill));
    }

    public function delete(int $id): Response
    {
        return $this->connector->send(new DeleteTeachingSkillRequest($id));
    }

    public function get(int $id): Response
    {
        return $this->connector->send(new GetTeachingSkillRequest($id));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patch(int $id, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchTeachingSkillRequest($id, $patch));
    }
}
