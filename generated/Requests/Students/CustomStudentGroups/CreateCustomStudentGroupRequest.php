<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Students\CustomStudentGroups;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Students\CustomStudentGroupForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a custom student group.
 *
 * POST /api/students/customgroups
 */
class CreateCustomStudentGroupRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\Students\CustomStudentGroupForCreate|array<string, mixed>  $customStudentGroup
     */
    public function __construct(
        protected CustomStudentGroupForCreate|array $customStudentGroup,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/students/customgroups';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->customStudentGroup instanceof Data ? $this->customStudentGroup->toArray() : $this->customStudentGroup;
    }
}
