<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\EmployeeContacts;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\HumanResources\EmployeeContact;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all contacts associated with an employee.
 *
 * GET /api/humanresources/employees/{employeeId}/contacts
 */
class GetEmployeeContactsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = EmployeeContact::class;
    public string $resultKey = 'contacts';

    public function __construct(
        protected int $employeeId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/employees/'.rawurlencode((string) $this->employeeId).'/contacts';
    }
}
