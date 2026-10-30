<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\Salaries;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\HumanResources\Salary;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a salary associated with a contract.
 *
 * GET /api/humanresources/contracts/{contractId}/salaries/{salaryId}
 */
#[Beta]
class GetSalaryRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = Salary::class;

    public function __construct(
        protected int $contractId,
        protected int $salaryId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/contracts/'.rawurlencode((string) $this->contractId).'/salaries/'.rawurlencode((string) $this->salaryId);
    }
}
