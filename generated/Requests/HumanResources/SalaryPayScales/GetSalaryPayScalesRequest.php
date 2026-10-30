<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\SalaryPayScales;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\HumanResources\SalaryPayScale;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all salary pay scales
 *
 * GET /api/humanresources/salaries/payscales
 */
#[Beta]
class GetSalaryPayScalesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = SalaryPayScale::class;
    public string $resultKey = 'salaryPayScales';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/salaries/payscales';
    }
}
