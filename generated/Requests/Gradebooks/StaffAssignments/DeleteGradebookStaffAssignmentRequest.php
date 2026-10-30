<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Gradebooks\StaffAssignments;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Removes a manual staff assignment to a Gradebook.
 *
 * DELETE /api/gradebooks/{gradebookId}/staff/assignments/{staffId}
 */
#[Beta]
class DeleteGradebookStaffAssignmentRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;

    public function __construct(
        protected int $gradebookId,
        protected string $staffId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks/'.rawurlencode((string) $this->gradebookId).'/staff/assignments/'.rawurlencode((string) $this->staffId);
    }
}
