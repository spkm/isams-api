<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Students\ContactGroups;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Students\ContactGroup;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all contact groups.
 *
 * GET /api/students/contactgroups
 */
class GetContactGroupsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = ContactGroup::class;
    public string $resultKey = 'contactGroups';

    public function __construct()
    {
    }

    public function resolveEndpoint(): string
    {
        return '/api/students/contactgroups';
    }
}
