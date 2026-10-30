<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\SystemConfiguration\List;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\SystemConfiguration\GlobalListItemWithCensusData;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all list items of the specified list type.
 *
 * GET /api/systemconfiguration/list/{listType}
 */
class GetListByTypeRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = GlobalListItemWithCensusData::class;
    public string $resultKey = 'items';
    protected bool $cacheable = true;

    public function __construct(
        protected string $listType,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/systemconfiguration/list/'.rawurlencode((string) $this->listType);
    }
}
