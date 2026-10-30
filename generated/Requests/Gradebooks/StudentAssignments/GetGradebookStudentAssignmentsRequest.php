<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Gradebooks\StudentAssignments;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Gradebooks\StudentAssignment;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieve students manually assigned to a Gradebook.
 *
 * GET /api/gradebooks/{gradebookId}/students/assignments
 */
#[Beta]
class GetGradebookStudentAssignmentsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = StudentAssignment::class;
    public string $resultKey = 'students';

    public function __construct(
        protected int $gradebookId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks/'.rawurlencode((string) $this->gradebookId).'/students/assignments';
    }
}
