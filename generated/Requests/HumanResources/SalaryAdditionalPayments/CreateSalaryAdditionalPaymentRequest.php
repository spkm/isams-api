<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\SalaryAdditionalPayments;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\CreateAdditionalPaymentCommandForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates an additional payment for a salary.
 *
 * POST /api/humanresources/salaries/{salaryId}/additionalpayments
 */
#[Beta]
class CreateSalaryAdditionalPaymentRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\CreateAdditionalPaymentCommandForCreate|array<string, mixed>  $command
     */
    public function __construct(
        protected int $salaryId,
        protected CreateAdditionalPaymentCommandForCreate|array $command,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/salaries/'.rawurlencode((string) $this->salaryId).'/additionalpayments';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->command instanceof Data ? $this->command->toArray() : $this->command;
    }
}
