<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeDisclosureBarringServiceChecks;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\HumanResources\DisclosureBarringServiceCheckForUpdate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Updates an disclosure barring service check.
 *
 * PUT /api/humanresources/employees/{employeeId}/disclosurebarringservicecheck
 */
class UpdateEmployeeDisclosureBarringServiceCheckRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::PUT;
    protected string $responseShape = self::NONE;

    /**
     * @param  \spkm\IsamsApi\Data\HumanResources\DisclosureBarringServiceCheckForUpdate|array<string, mixed>  $disclosureBarringServiceCheck
     */
    public function __construct(
        protected int $employeeId,
        protected DisclosureBarringServiceCheckForUpdate|array $disclosureBarringServiceCheck,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/disclosurebarringservicecheck';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->disclosureBarringServiceCheck instanceof Data ? $this->disclosureBarringServiceCheck->toArray() : $this->disclosureBarringServiceCheck;
    }
}
