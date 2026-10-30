<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Gradebooks\Student;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Gradebooks\GradebookStudent;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieve student allocations and assignments against a Gradebook.
 *
 * GET /api/gradebooks/{gradebookId}/students
 */
#[Beta]
class GetGradebookStudentsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = GradebookStudent::class;

    public function __construct(
        protected int $gradebookId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks/'.rawurlencode((string) $this->gradebookId).'/students';
    }
}
