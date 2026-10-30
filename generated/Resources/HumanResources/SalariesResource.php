<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\HumanResources\Salary;
use spkm\IsamsApi\Data\HumanResources\SalaryForCreate;
use spkm\IsamsApi\Requests\HumanResources\Salaries\CreateSalaryRequest;
use spkm\IsamsApi\Requests\HumanResources\Salaries\DeleteSalaryRequest;
use spkm\IsamsApi\Requests\HumanResources\Salaries\GetSalariesRequest;
use spkm\IsamsApi\Requests\HumanResources\Salaries\GetSalaryRequest;
use spkm\IsamsApi\Requests\HumanResources\Salaries\PatchSalaryRequest;
use spkm\IsamsApi\Resources\IsamsResource;
use spkm\IsamsApi\Support\JsonPatch;

class SalariesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\HumanResources\Salary>
     * @see \spkm\IsamsApi\Requests\HumanResources\Salaries\GetSalariesRequest
     */
    public function all(int $contractId): Collection
    {
        return $this->fetch(new GetSalariesRequest(contractId: $contractId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\SalaryForCreate|array<string, mixed>  $salary
     * @see \spkm\IsamsApi\Requests\HumanResources\Salaries\CreateSalaryRequest
     */
    public function create(int $contractId, SalaryForCreate|array $salary): Created
    {
        return $this->fetch(new CreateSalaryRequest(contractId: $contractId, salary: $salary));
    }

    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\Salaries\DeleteSalaryRequest
     */
    public function delete(int $contractId, int $salaryId): void
    {
        $this->fetch(new DeleteSalaryRequest(contractId: $contractId, salaryId: $salaryId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\HumanResources\Salaries\GetSalaryRequest
     */
    public function get(int $contractId, int $salaryId): Salary
    {
        return $this->fetch(new GetSalaryRequest(contractId: $contractId, salaryId: $salaryId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     * @see \spkm\IsamsApi\Requests\HumanResources\Salaries\PatchSalaryRequest
     */
    public function patch(int $contractId, int $salaryId, JsonPatch|array $patch): void
    {
        $this->fetch(new PatchSalaryRequest(contractId: $contractId, salaryId: $salaryId, patch: $patch));
    }
}
