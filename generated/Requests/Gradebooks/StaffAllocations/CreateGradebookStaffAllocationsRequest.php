<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Gradebooks\StaffAllocations;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Add staff allocations to a Gradebook
 *
 * POST /api/gradebooks/{gradebookId}/staff/allocations/{criteria}
 */
#[Beta]
class CreateGradebookStaffAllocationsRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  array<mixed>  $staffAllocations
     */
    public function __construct(
        protected int $gradebookId,
        protected string $criteria,
        protected array $staffAllocations,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks/'.rawurlencode((string) $this->gradebookId).'/staff/allocations/'.rawurlencode((string) $this->criteria);
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return array_values($this->staffAllocations);
    }
}
