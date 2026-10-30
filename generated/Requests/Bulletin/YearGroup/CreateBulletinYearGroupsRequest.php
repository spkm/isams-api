<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Bulletin\YearGroup;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Attributes\Beta;
use spkm\IsamsApi\Data\Bulletin\BulletinYearGroupsForCreate;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Update a bulletin's associated year groups
 *
 * POST /api/bulletin/{bulletinId}/yeargroups
 */
#[Beta]
class CreateBulletinYearGroupsRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\Bulletin\BulletinYearGroupsForCreate|array<string, mixed>  $bulletinYearGroups
     */
    public function __construct(
        protected int $bulletinId,
        protected BulletinYearGroupsForCreate|array $bulletinYearGroups,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/bulletin/'.rawurlencode((string) $this->bulletinId).'/yeargroups';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->bulletinYearGroups instanceof Data ? $this->bulletinYearGroups->toArray() : $this->bulletinYearGroups;
    }
}
