<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\Salaries;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\SalaryForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a salary for a contract.
 *
 * POST /api/humanresources/contracts/{contractId}/salaries
 */
#[Beta]
class CreateSalaryRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\SalaryForCreate|array<string, mixed>  $salary
     */
    public function __construct(
        protected int $contractId,
        protected SalaryForCreate|array $salary,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/contracts/'.rawurlencode((string) $this->contractId).'/salaries';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->salary instanceof Data ? $this->salary->toArray() : $this->salary;
    }
}
