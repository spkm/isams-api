<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Gradebooks\Staff;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Gradebooks\Staff;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieve staff allocations and assignments against a Gradebook.
 *
 * GET /api/gradebooks/{gradebookId}/staff
 */
#[Beta]
class GetGradebookStaffRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Staff::class;

    public function __construct(
        protected int $gradebookId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks/'.rawurlencode((string) $this->gradebookId).'/staff';
    }
}
