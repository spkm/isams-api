<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use spkm\IsamsApi\Requests\Gradebooks\DisassociatedStudent\RemoveGradebookDisassociatedStudentRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class DisassociatedStudentResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\Gradebooks\DisassociatedStudent\RemoveGradebookDisassociatedStudentRequest
     */
    public function remove(int $gradebookId, string $schoolId): bool
    {
        $this->fetch(new RemoveGradebookDisassociatedStudentRequest(gradebookId: $gradebookId, schoolId: $schoolId));

        return true;
    }
}
