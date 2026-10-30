<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Gradebooks\StaffAllocations;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Removes a staff allocation of a specific type from a Gradebook
 *
 * DELETE /api/gradebooks/{gradebookId}/staff/allocations/{criteria}/{allocationId}
 */
#[Beta]
class DeleteGradebookStaffAllocationRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;

    public function __construct(
        protected int $gradebookId,
        protected string $criteria,
        protected int $allocationId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks/'.rawurlencode((string) $this->gradebookId).'/staff/allocations/'.rawurlencode((string) $this->criteria).'/'.rawurlencode((string) $this->allocationId);
    }
}
