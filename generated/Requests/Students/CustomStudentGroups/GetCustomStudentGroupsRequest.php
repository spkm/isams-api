<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Students\CustomStudentGroups;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Students\CustomStudentGroup;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all custom student groups.
 *
 * GET /api/students/customgroups
 */
class GetCustomStudentGroupsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = CustomStudentGroup::class;
    public string $resultKey = 'customStudentGroups';

    public function __construct(
        protected string|\Stringable|null $filter = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/students/customgroups';
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
