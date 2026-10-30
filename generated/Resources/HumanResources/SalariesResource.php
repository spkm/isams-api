<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\HumanResources\CreateSalaryCommandForCreate;
use spkm\IsamsApi\Requests\HumanResources\Salaries\CreateSalaryRequest;
use spkm\IsamsApi\Requests\HumanResources\Salaries\DeleteSalaryRequest;
use spkm\IsamsApi\Requests\HumanResources\Salaries\GetSalariesRequest;
use spkm\IsamsApi\Requests\HumanResources\Salaries\GetSalaryRequest;
use spkm\IsamsApi\Requests\HumanResources\Salaries\PatchSalaryRequest;
use spkm\IsamsApi\Support\JsonPatch;

class SalariesResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\CreateSalaryCommandForCreate|array<string, mixed>  $command
     */
    public function createSalary(int $contractId, CreateSalaryCommandForCreate|array $command): Response
    {
        return $this->connector->send(new CreateSalaryRequest($contractId, $command));
    }

    public function deleteSalary(int $contractId, int $salaryId): Response
    {
        return $this->connector->send(new DeleteSalaryRequest($contractId, $salaryId));
    }

    public function getSalaries(int $contractId): Response
    {
        return $this->connector->send(new GetSalariesRequest($contractId));
    }

    public function getSalary(int $contractId, int $salaryId): Response
    {
        return $this->connector->send(new GetSalaryRequest($contractId, $salaryId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patchSalary(int $contractId, int $salaryId, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchSalaryRequest($contractId, $salaryId, $patch));
    }
}
