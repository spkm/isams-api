<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\SalaryAdditionalPayments;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Deletes an additional payment for the salary
 *
 * DELETE /api/humanresources/salaries/{salaryId}/additionalpayments/{additionalPaymentId}
 */
#[Beta]
class DeleteSalaryAdditionalPaymentRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;

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
