<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\HumanResources\CreateAdditionalPaymentCommandForCreate;
use spkm\IsamsApi\Requests\HumanResources\SalaryAdditionalPayments\CreateSalaryAdditionalPaymentRequest;
use spkm\IsamsApi\Requests\HumanResources\SalaryAdditionalPayments\DeleteSalaryAdditionalPaymentRequest;
use spkm\IsamsApi\Requests\HumanResources\SalaryAdditionalPayments\GetSalaryAdditionalPaymentRequest;
use spkm\IsamsApi\Requests\HumanResources\SalaryAdditionalPayments\GetSalaryAdditionalPaymentsRequest;
use spkm\IsamsApi\Requests\HumanResources\SalaryAdditionalPayments\PatchSalaryAdditionalPaymentRequest;
use spkm\IsamsApi\Support\JsonPatch;

class SalaryAdditionalPaymentsResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\CreateAdditionalPaymentCommandForCreate|array<string, mixed>  $command
     */
    public function createSalaryAdditionalPayment(
        int $salaryId,
        CreateAdditionalPaymentCommandForCreate|array $command,
    ): Response {
        return $this->connector->send(new CreateSalaryAdditionalPaymentRequest($salaryId, $command));
    }

    public function deleteSalaryAdditionalPayment(int $salaryId, int $additionalPaymentId): Response
    {
        return $this->connector->send(new DeleteSalaryAdditionalPaymentRequest($salaryId, $additionalPaymentId));
    }

    public function getSalaryAdditionalPayment(int $salaryId, int $additionalPaymentId): Response
    {
        return $this->connector->send(new GetSalaryAdditionalPaymentRequest($salaryId, $additionalPaymentId));
    }

    public function getSalaryAdditionalPayments(int $salaryId): Response
    {
        return $this->connector->send(new GetSalaryAdditionalPaymentsRequest($salaryId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patchSalaryAdditionalPayment(
        int $salaryId,
        int $additionalPaymentId,
        JsonPatch|array $patch,
    ): Response {
        return $this->connector->send(new PatchSalaryAdditionalPaymentRequest($salaryId, $additionalPaymentId, $patch));
    }
}
