<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Gradebooks\Structure\GetGradebookStructureRequest;

class StructureResource extends BaseResource
{
    public function getGradebookStructure(int $gradebookId): Response
    {
        return $this->connector->send(new GetGradebookStructureRequest($gradebookId));
    }
}
