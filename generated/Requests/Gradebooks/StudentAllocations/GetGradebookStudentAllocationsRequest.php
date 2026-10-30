<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Gradebooks\StudentAllocations;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Gradebooks\Allocation;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieve student allocations against a Gradebook.
 *
 * GET /api/gradebooks/{gradebookId}/students/allocations/{criteria}
 */
#[Beta]
class GetGradebookStudentAllocationsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Allocation::class;

    public function __construct(
        protected int $gradebookId,
        protected string $criteria,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks/'.rawurlencode((string) $this->gradebookId).'/students/allocations/'.rawurlencode((string) $this->criteria);
    }
}
