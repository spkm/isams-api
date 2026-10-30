<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Stringable;
use spkm\IsamsApi\Data\Bulletin\BulletinForCreate;
use spkm\IsamsApi\Requests\Bulletin\CreateBulletinRequest;
use spkm\IsamsApi\Requests\Bulletin\GetBulletinsByGroupRequest;
use spkm\IsamsApi\Requests\Bulletin\GetBulletinsRequest;
use spkm\IsamsApi\Resources\Bulletin\CategoryResource;
use spkm\IsamsApi\Resources\Bulletin\DivisionsResource;
use spkm\IsamsApi\Resources\Bulletin\YearGroupResource;

class BulletinResource extends BaseResource
{
    public function category(): CategoryResource
    {
        return new CategoryResource($this->connector);
    }

    public function divisions(): DivisionsResource
    {
        return new DivisionsResource($this->connector);
    }

    public function yearGroup(): YearGroupResource
    {
        return new YearGroupResource($this->connector);
    }

    public function all(?int $page = null, ?int $pageSize = null, string|Stringable|null $filter = null): Response
    {
        return $this->connector->send(new GetBulletinsRequest($page, $pageSize, $filter));
    }

    /**
     * @param  \spkm\IsamsApi\Data\Bulletin\BulletinForCreate|array<string, mixed>  $bulletin
     */
    public function create(BulletinForCreate|array $bulletin): Response
    {
        return $this->connector->send(new CreateBulletinRequest($bulletin));
    }

    public function getByGroup(int $groupId): Response
    {
        return $this->connector->send(new GetBulletinsByGroupRequest($groupId));
    }
}
