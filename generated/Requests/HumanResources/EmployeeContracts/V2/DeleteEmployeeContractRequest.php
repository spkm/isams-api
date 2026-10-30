<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeContracts\V2;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Deletes a contract for the employee
 *
 * DELETE /api/humanresources/employees/{employeeId}/contracts/{contractId}
 */
#[Beta]
class DeleteEmployeeContractRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;
    protected ?string $apiVersion = '2.0';

    public function __construct(
        protected int $employeeId,
        protected int $contractId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/contracts/'.rawurlencode((string) $this->contractId);
    }
}
