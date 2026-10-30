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
 * Retrieves all salaries associated with a contract.
 *
 * GET /api/humanresources/contracts/{contractId}/salaries
 */
#[Beta]
class GetSalariesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Salary::class;
    public string $resultKey = 'salaries';

    public function __construct(
        protected int $contractId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/contracts/'.rawurlencode((string) $this->contractId).'/salaries';
    }
}
