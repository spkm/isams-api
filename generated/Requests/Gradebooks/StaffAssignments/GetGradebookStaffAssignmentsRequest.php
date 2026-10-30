<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Gradebooks\StaffAssignments;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Gradebooks\StaffAssignment;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieve staff manually assigned to a Gradebook.
 *
 * GET /api/gradebooks/{gradebookId}/staff/assignments
 */
#[Beta]
class GetGradebookStaffAssignmentsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = StaffAssignment::class;
    public string $resultKey = 'staff';

    public function __construct(
        protected int $gradebookId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks/'.rawurlencode((string) $this->gradebookId).'/staff/assignments';
    }
}
