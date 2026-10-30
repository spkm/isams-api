<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\HumanResources\AdditionalPayment;
use spkm\IsamsApi\Data\HumanResources\AdditionalPaymentForCreate;
use spkm\IsamsApi\Requests\HumanResources\SalaryAdditionalPayments\CreateSalaryAdditionalPaymentRequest;
use spkm\IsamsApi\Requests\HumanResources\SalaryAdditionalPayments\DeleteSalaryAdditionalPaymentRequest;
use spkm\IsamsApi\Requests\HumanResources\SalaryAdditionalPayments\GetSalaryAdditionalPaymentRequest;
use spkm\IsamsApi\Requests\HumanResources\SalaryAdditionalPayments\GetSalaryAdditionalPaymentsRequest;
use spkm\IsamsApi\Requests\HumanResources\SalaryAdditionalPayments\PatchSalaryAdditionalPaymentRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class SalaryAdditionalPaymentsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\HumanResources\AdditionalPayment>
     * @see \spkm\IsamsApi\Requests\HumanResources\SalaryAdditionalPayments\GetSalaryAdditionalPaymentsRequest
     */
    public function all(int $salaryId): Collection
    {
        return $this->fetch(new GetSalaryAdditionalPaymentsRequest(salaryId: $salaryId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\AdditionalPaymentForCreate|array<string, mixed>  $additionalPayment
     * @see \spkm\IsamsApi\Requests\HumanResources\SalaryAdditionalPayments\CreateSalaryAdditionalPaymentRequest
     */
    public function create(int $salaryId, AdditionalPaymentForCreate|array $additionalPayment): Created
    {
        return $this->fetch(new CreateSalaryAdditionalPaymentRequest(salaryId: $salaryId, additionalPayment: $additionalPayment));
    }

    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\SalaryAdditionalPayments\DeleteSalaryAdditionalPaymentRequest
     */
    public function delete(int $salaryId, int $additionalPaymentId): bool
    {
        $this->fetch(new DeleteSalaryAdditionalPaymentRequest(salaryId: $salaryId, additionalPaymentId: $additionalPaymentId));

        return true;
    }

    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\SalaryAdditionalPayments\GetSalaryAdditionalPaymentRequest
     */
    public function get(int $salaryId, int $additionalPaymentId): AdditionalPayment
    {
        return $this->fetch(new GetSalaryAdditionalPaymentRequest(salaryId: $salaryId, additionalPaymentId: $additionalPaymentId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\HumanResources\SalaryAdditionalPayments\PatchSalaryAdditionalPaymentRequest
     */
    public function patch(int $salaryId, int $additionalPaymentId, JsonPatch|array $patch): bool
    {
        $this->fetch(new PatchSalaryAdditionalPaymentRequest(salaryId: $salaryId, additionalPaymentId: $additionalPaymentId, patch: $patch));

        return true;
    }
}
