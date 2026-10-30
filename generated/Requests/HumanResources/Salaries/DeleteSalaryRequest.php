<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\Salaries;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Deletes a salary for the contract
 *
 * DELETE /api/humanresources/contracts/{contractId}/salaries/{salaryId}
 */
#[Beta]
class DeleteSalaryRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;

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
