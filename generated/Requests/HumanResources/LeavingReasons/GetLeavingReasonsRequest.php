<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\HumanResources\LeavingReasons;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\HumanResources\GlobalListItem;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all leaving reasons.
 *
 * GET /api/humanresources/leavingreasons
 */
class GetLeavingReasonsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = GlobalListItem::class;
    public string $resultKey = 'items';
    protected bool $cacheable = true;

    public function resolveEndpoint(): string
    {
        return '/api/humanresources/leavingreasons';
    }
}
