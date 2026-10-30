<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\School\Departments;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\School\Department;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves the details of a particular type of department by its unique identifier.
 *
 * GET /api/school/departments/{departmentType}/{id}
 */
class GetDepartmentRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = Department::class;
    protected bool $cacheable = true;

    public function __construct(
        protected string $departmentType,
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/school/departments/'.rawurlencode((string) $this->departmentType).'/'.rawurlencode((string) $this->id);
    }
}
