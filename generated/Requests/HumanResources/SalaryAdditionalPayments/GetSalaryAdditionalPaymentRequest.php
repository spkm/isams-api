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
 * Retrieves an additional payment for a salary.
 *
 * GET /api/humanresources/salaries/{salaryId}/additionalpayments/{additionalPaymentId}
 */
#[Beta]
class GetSalaryAdditionalPaymentRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = AdditionalPayment::class;

    public function __construct(
        protected int $salaryId,
        protected int $additionalPaymentId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/salaries/'.rawurlencode((string) $this->salaryId).'/additionalpayments/'.rawurlencode((string) $this->additionalPaymentId);
    }
}
