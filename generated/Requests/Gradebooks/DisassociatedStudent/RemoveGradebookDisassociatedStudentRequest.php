<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Gradebooks\DisassociatedStudent;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Remove a disassociated student from a Gradebook.
 *
 * DELETE /api/gradebooks/{gradebookId}/students/dissociated/{schoolId}
 */
#[Beta]
class RemoveGradebookDisassociatedStudentRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;

    public function __construct(
        protected int $gradebookId,
        protected string $schoolId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks/'.rawurlencode((string) $this->gradebookId).'/students/dissociated/'.rawurlencode((string) $this->schoolId);
    }
}
