<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\Gradebooks\GroupStructureForCreate;
use spkm\IsamsApi\Requests\Gradebooks\GroupStructure\CreateGradebookGroupRequest;
use spkm\IsamsApi\Requests\Gradebooks\GroupStructure\DeleteGradebookGroupRequest;
use spkm\IsamsApi\Requests\Gradebooks\GroupStructure\GetGradebookGroupRequest;
use spkm\IsamsApi\Requests\Gradebooks\GroupStructure\PatchGradebookGroupRequest;
use spkm\IsamsApi\Support\JsonPatch;

class GroupStructureResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\Gradebooks\GroupStructureForCreate|array<string, mixed>  $groupStructure
     */
    public function createGradebookGroup(int $gradebookId, GroupStructureForCreate|array $groupStructure): Response
    {
        return $this->connector->send(new CreateGradebookGroupRequest($gradebookId, $groupStructure));
    }

    public function deleteGradebookGroup(int $gradebookId, int $groupId): Response
    {
        return $this->connector->send(new DeleteGradebookGroupRequest($gradebookId, $groupId));
    }

    public function getGradebookGroup(int $gradebookId, int $groupId): Response
    {
        return $this->connector->send(new GetGradebookGroupRequest($gradebookId, $groupId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patchGradebookGroup(int $gradebookId, int $groupId, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchGradebookGroupRequest($gradebookId, $groupId, $patch));
    }
}
