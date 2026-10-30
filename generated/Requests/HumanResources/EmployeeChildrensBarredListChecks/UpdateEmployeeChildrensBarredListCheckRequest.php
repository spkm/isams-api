<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeChildrensBarredListChecks;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\ChildrensBarredListCheckForUpdate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Updates a children's barred list check.
 *
 * PUT /api/humanresources/employees/{employeeId}/childrensbarredlistcheck
 */
class UpdateEmployeeChildrensBarredListCheckRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\ChildrensBarredListCheckForUpdate|array<string, mixed>  $childrensBarredListCheck
     */
    public function __construct(
        protected int $employeeId,
        protected ChildrensBarredListCheckForUpdate|array $childrensBarredListCheck,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/childrensbarredlistcheck';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->childrensBarredListCheck instanceof Data ? $this->childrensBarredListCheck->toArray() : $this->childrensBarredListCheck;
    }
}
