<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\Gradebooks\GroupStructureForCreate;
use spkm\IsamsApi\Requests\Gradebooks\Group\CreateGradebookGroupRequest;
use spkm\IsamsApi\Requests\Gradebooks\Group\DeleteGradebookGroupRequest;
use spkm\IsamsApi\Requests\Gradebooks\Group\GetGradebookGroupRequest;
use spkm\IsamsApi\Requests\Gradebooks\Group\PatchGradebookGroupRequest;
use spkm\IsamsApi\Support\JsonPatch;

class GroupResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\Gradebooks\GroupStructureForCreate|array<string, mixed>  $groupStructure
     */
    public function create(int $gradebookId, GroupStructureForCreate|array $groupStructure): Response
    {
        return $this->connector->send(new CreateGradebookGroupRequest($gradebookId, $groupStructure));
    }

    public function delete(int $gradebookId, int $groupId): Response
    {
        return $this->connector->send(new DeleteGradebookGroupRequest($gradebookId, $groupId));
    }

    public function get(int $gradebookId, int $groupId): Response
    {
        return $this->connector->send(new GetGradebookGroupRequest($gradebookId, $groupId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patch(int $gradebookId, int $groupId, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchGradebookGroupRequest($gradebookId, $groupId, $patch));
    }
}
