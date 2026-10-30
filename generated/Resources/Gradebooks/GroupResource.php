<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\Gradebooks\GroupStructure;
use spkm\IsamsApi\Data\Gradebooks\GroupStructureForCreate;
use spkm\IsamsApi\Requests\Gradebooks\Group\CreateGradebookGroupRequest;
use spkm\IsamsApi\Requests\Gradebooks\Group\DeleteGradebookGroupRequest;
use spkm\IsamsApi\Requests\Gradebooks\Group\GetGradebookGroupRequest;
use spkm\IsamsApi\Requests\Gradebooks\Group\PatchGradebookGroupRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class GroupResource extends IsamsResource
{
    /**
     * @param  \spkm\IsamsApi\Data\Gradebooks\GroupStructureForCreate|array<string, mixed>  $groupStructure
     * @see \spkm\IsamsApi\Requests\Gradebooks\Group\CreateGradebookGroupRequest
     */
    public function create(int $gradebookId, GroupStructureForCreate|array $groupStructure): Created
    {
        return $this->fetch(new CreateGradebookGroupRequest(gradebookId: $gradebookId, groupStructure: $groupStructure));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Gradebooks\Group\DeleteGradebookGroupRequest
     */
    public function delete(int $gradebookId, int $groupId): bool
    {
        $this->fetch(new DeleteGradebookGroupRequest(gradebookId: $gradebookId, groupId: $groupId));

        return true;
    }

    /**
     * @see \spkm\IsamsApi\Requests\Gradebooks\Group\GetGradebookGroupRequest
     */
    public function get(int $gradebookId, int $groupId): GroupStructure
    {
        return $this->fetch(new GetGradebookGroupRequest(gradebookId: $gradebookId, groupId: $groupId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\Gradebooks\Group\PatchGradebookGroupRequest
     */
    public function patch(int $gradebookId, int $groupId, JsonPatch|array $patch): bool
    {
        $this->fetch(new PatchGradebookGroupRequest(gradebookId: $gradebookId, groupId: $groupId, patch: $patch));

        return true;
    }
}
