<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Bulletin;

use Saloon\Enums\Method;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Bulletin\Bulletin;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a collection of bulletin items by group id.
 *
 * GET /api/bulletin/group/{groupId}
 */
#[Beta]
class GetBulletinsByGroupRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Bulletin::class;
    public string $resultKey = 'bulletins';

    public function __construct(
        protected int $groupId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/bulletin/group/'.rawurlencode((string) $this->groupId);
    }
}
