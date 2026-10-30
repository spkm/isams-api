<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Gradebooks\StaffAssignments;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Add manually assigned staff to a Gradebook.
 *
 * POST /api/gradebooks/{gradebookId}/staff/assignments
 */
#[Beta]
class AddGradebookStaffAssignmentsRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  array<mixed>  $staffIds
     */
    public function __construct(
        protected int $gradebookId,
        protected array $staffIds,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks/'.rawurlencode((string) $this->gradebookId).'/staff/assignments';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return array_values($this->staffIds);
    }
}
