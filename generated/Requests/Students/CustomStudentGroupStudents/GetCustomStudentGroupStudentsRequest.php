<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Students\CustomStudentGroupStudents;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Students\CustomStudentGroupStudent;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all custom student group associations.
 *
 * GET /api/students/customgroups/{customGroupId}/students
 */
class GetCustomStudentGroupStudentsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = CustomStudentGroupStudent::class;
    public string $resultKey = 'students';

    public function __construct(
        protected int $customGroupId,
        protected string|\Stringable|null $filter = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/students/customgroups/'.rawurlencode((string) $this->customGroupId).'/students';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return array_filter([
            '$filter' => $this->filter === null ? null : (string) $this->filter,
        ], fn (mixed $value) => $value !== null);
    }
}
