<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use spkm\IsamsApi\Requests\Gradebooks\ColumnMarks\PatchGradebookColumnMarkRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class ColumnMarksResource extends IsamsResource
{
    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\Gradebooks\ColumnMarks\PatchGradebookColumnMarkRequest
     */
    public function patch(int $gradebookId, int $columnId, string $schoolId, JsonPatch|array $patch): void
    {
        $this->fetch(new PatchGradebookColumnMarkRequest(gradebookId: $gradebookId, columnId: $columnId, schoolId: $schoolId, patch: $patch));
    }
}
