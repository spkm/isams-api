<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\SalaryAdditionalPayments;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\HumanResources\AdditionalPayment;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all additional payments for a salary.
 *
 * GET /api/humanresources/salaries/{salaryId}/additionalpayments
 */
#[Beta]
class GetSalaryAdditionalPaymentsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = AdditionalPayment::class;
    public string $resultKey = 'additionalPayments';

    public function __construct(
        protected int $salaryId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/salaries/'.rawurlencode((string) $this->salaryId).'/additionalpayments';
    }
}
