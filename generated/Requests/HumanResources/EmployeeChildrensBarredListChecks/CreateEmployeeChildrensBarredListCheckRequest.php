<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeChildrensBarredListChecks;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\ChildrensBarredListCheckForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a children's barred list check.
 *
 * POST /api/humanresources/employees/{employeeId}/childrensbarredlistcheck
 */
class CreateEmployeeChildrensBarredListCheckRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\ChildrensBarredListCheckForCreate|array<string, mixed>  $childrensBarredListCheck
     */
    public function __construct(
        protected int $employeeId,
        protected ChildrensBarredListCheckForCreate|array $childrensBarredListCheck,
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
