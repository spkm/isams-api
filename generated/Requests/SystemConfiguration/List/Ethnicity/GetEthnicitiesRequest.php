<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\SystemConfiguration\List\Ethnicity;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemWithCensusData;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all ethnic groups.
 *
 * GET /api/systemconfiguration/list/ethnicity
 */
class GetEthnicitiesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = GlobalListItemWithCensusData::class;
    public string $resultKey = 'items';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/systemconfiguration/list/ethnicity';
    }
}
