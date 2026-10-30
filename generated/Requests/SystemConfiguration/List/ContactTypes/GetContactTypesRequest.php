<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\SystemConfiguration\List\ContactTypes;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\SystemConfiguration\ContactType;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all contact types.
 *
 * GET /api/systemconfiguration/list/contacttypes
 */
class GetContactTypesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = ContactType::class;
    public string $resultKey = 'contactTypes';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/systemconfiguration/list/contacttypes';
    }
}
