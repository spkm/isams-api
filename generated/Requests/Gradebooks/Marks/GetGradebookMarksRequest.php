<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Gradebooks\Marks;

use Saloon\Enums\Method;
use Saloon\PaginationPlugin\Contracts\Paginatable;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Gradebooks\Student;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieve all students, with their marks against a Gradebook.
 *
 * GET /api/gradebooks/{gradebookId}/marks
 */
#[Beta]
class GetGradebookMarksRequest extends IsamsRequest implements Paginatable
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Student::class;
    public string $resultKey = 'students';

    public function __construct(
        protected int $gradebookId,
        protected ?int $page = null,
        protected ?int $pageSize = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/gradebooks/'.rawurlencode((string) $this->gradebookId).'/marks';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return array_filter([
            'page' => $this->page,
            'pageSize' => $this->pageSize,
        ], fn (mixed $value) => $value !== null);
    }
}
