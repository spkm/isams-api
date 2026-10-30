<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Gradebooks;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Gradebooks\DisassociatedStudent\RemoveGradebookDisassociatedStudentRequest;

class DisassociatedStudentResource extends BaseResource
{
    public function removeGradebookDisassociatedStudent(int $gradebookId, string $schoolId): Response
    {
        return $this->connector->send(new RemoveGradebookDisassociatedStudentRequest($gradebookId, $schoolId));
    }
}
