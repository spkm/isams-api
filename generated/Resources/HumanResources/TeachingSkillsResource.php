<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\HumanResources\TeachingSkill;
use spkm\IsamsApi\Data\HumanResources\TeachingSkillForCreate;
use spkm\IsamsApi\Requests\HumanResources\TeachingSkills\CreateTeachingSkillRequest;
use spkm\IsamsApi\Requests\HumanResources\TeachingSkills\DeleteTeachingSkillRequest;
use spkm\IsamsApi\Requests\HumanResources\TeachingSkills\GetTeachingSkillRequest;
use spkm\IsamsApi\Requests\HumanResources\TeachingSkills\GetTeachingSkillsRequest;
use spkm\IsamsApi\Requests\HumanResources\TeachingSkills\PatchTeachingSkillRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class TeachingSkillsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\HumanResources\TeachingSkill>
     * @see \spkm\IsamsApi\Requests\HumanResources\TeachingSkills\GetTeachingSkillsRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetTeachingSkillsRequest());
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\TeachingSkillForCreate|array<string, mixed>  $teachingSkill
     * @see \spkm\IsamsApi\Requests\HumanResources\TeachingSkills\CreateTeachingSkillRequest
     */
    public function create(TeachingSkillForCreate|array $teachingSkill): Created
    {
        return $this->fetch(new CreateTeachingSkillRequest(teachingSkill: $teachingSkill));
    }

    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\TeachingSkills\DeleteTeachingSkillRequest
     */
    public function delete(int $id): void
    {
        $this->fetch(new DeleteTeachingSkillRequest(id: $id));
    }

    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\TeachingSkills\GetTeachingSkillRequest
     */
    public function get(int $id): TeachingSkill
    {
        return $this->fetch(new GetTeachingSkillRequest(id: $id));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\HumanResources\TeachingSkills\PatchTeachingSkillRequest
     */
    public function patch(int $id, JsonPatch|array $patch): void
    {
        $this->fetch(new PatchTeachingSkillRequest(id: $id, patch: $patch));
    }
}
