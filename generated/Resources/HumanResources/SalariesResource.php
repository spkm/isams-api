<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\HumanResources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\HumanResources\SalaryForCreate;
use spkm\IsamsApi\Requests\HumanResources\Salaries\CreateSalaryRequest;
use spkm\IsamsApi\Requests\HumanResources\Salaries\DeleteSalaryRequest;
use spkm\IsamsApi\Requests\HumanResources\Salaries\GetSalariesRequest;
use spkm\IsamsApi\Requests\HumanResources\Salaries\GetSalaryRequest;
use spkm\IsamsApi\Requests\HumanResources\Salaries\PatchSalaryRequest;
use spkm\IsamsApi\Support\JsonPatch;

class SalariesResource extends BaseResource
{
    public function all(int $contractId): Response
    {
        return $this->connector->send(new GetSalariesRequest($contractId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\SalaryForCreate|array<string, mixed>  $salary
     */
    public function create(int $contractId, SalaryForCreate|array $salary): Response
    {
        return $this->connector->send(new CreateSalaryRequest($contractId, $salary));
    }

    public function delete(int $contractId, int $salaryId): Response
    {
        return $this->connector->send(new DeleteSalaryRequest($contractId, $salaryId));
    }

    public function get(int $contractId, int $salaryId): Response
    {
        return $this->connector->send(new GetSalaryRequest($contractId, $salaryId));
    }

    /**
     * @param  \spkm\IsamsApi\Support\JsonPatch|list<array<string, mixed>>  $patch
     */
    public function patch(int $contractId, int $salaryId, JsonPatch|array $patch): Response
    {
        return $this->connector->send(new PatchSalaryRequest($contractId, $salaryId, $patch));
    }
}
