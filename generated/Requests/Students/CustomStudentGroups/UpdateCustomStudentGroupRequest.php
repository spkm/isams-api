<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Students\CustomStudentGroups;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Students\CustomStudentGroupForUpdate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Updates a custom student group.
 *
 * PUT /api/students/customgroups/{id}
 */
class UpdateCustomStudentGroupRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\Students\CustomStudentGroupForUpdate|array<string, mixed>  $customStudentGroup
     */
    public function __construct(
        protected int $id,
        protected CustomStudentGroupForUpdate|array $customStudentGroup,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/students/customgroups/'.rawurlencode((string) $this->id);
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->customStudentGroup instanceof Data ? $this->customStudentGroup->toArray() : $this->customStudentGroup;
    }
}
