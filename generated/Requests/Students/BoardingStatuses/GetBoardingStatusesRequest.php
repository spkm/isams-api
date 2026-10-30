<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Students\BoardingStatuses;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Students\GlobalListItem;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all boarding statuses.
 *
 * GET /api/students/boardingstatuses
 */
class GetBoardingStatusesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = GlobalListItem::class;
    public string $resultKey = 'items';

    public function __construct()
    {
    }

    public function resolveEndpoint(): string
    {
        return '/api/students/boardingstatuses';
    }
}
