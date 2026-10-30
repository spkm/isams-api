<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Gradebooks\StudentAssignments;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Add manually assigned students to a Gradebook.
 *
 * POST /api/gradebooks/{gradebookId}/students/assignments
 */
#[Beta]
class AddGradebookStudentAssignmentsRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  array<mixed>  $schoolIds
     */
    public function __construct(
        protected int $gradebookId,
        protected array $schoolIds,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks/'.rawurlencode((string) $this->gradebookId).'/students/assignments';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->schoolIds;
    }
}
