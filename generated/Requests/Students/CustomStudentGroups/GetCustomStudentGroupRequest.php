<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Students\CustomStudentGroups;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Students\CustomStudentGroup;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a custom student group.
 *
 * GET /api/students/customgroups/{id}
 */
class GetCustomStudentGroupRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = CustomStudentGroup::class;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/students/customgroups/'.rawurlencode((string) $this->id);
    }
}
