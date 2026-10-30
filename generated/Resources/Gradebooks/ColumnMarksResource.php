<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Gradebooks\ColumnMarks\PatchGradebookColumnMarkRequest;
use spkm\IsamsApi\Support\JsonPatch;

class ColumnMarksResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patchGradebookColumnMark(
        int $gradebookId,
        int $columnId,
        string $schoolId,
        JsonPatch|array $patch,
    ): Response {
        return $this->connector->send(new PatchGradebookColumnMarkRequest($gradebookId, $columnId, $schoolId, $patch));
    }
}
