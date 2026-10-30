<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources;

use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;
use Stringable;
use spkm\IsamsApi\Data\Bulletin\Bulletin;
use spkm\IsamsApi\Data\Bulletin\BulletinForCreate;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Requests\Bulletin\CreateBulletinRequest;
use spkm\IsamsApi\Requests\Bulletin\GetBulletinsByGroupRequest;
use spkm\IsamsApi\Requests\Bulletin\GetBulletinsRequest;
use spkm\IsamsApi\Resources\Bulletin\CategoryResource;
use spkm\IsamsApi\Resources\Bulletin\DivisionsResource;
use spkm\IsamsApi\Resources\Bulletin\YearGroupResource;

class BulletinResource extends IsamsResource
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

    /**
     * @return \Illuminate\Support\LazyCollection<int, \spkm\IsamsApi\Data\Bulletin\Bulletin>
     * @see \spkm\IsamsApi\Requests\Bulletin\GetBulletinsRequest
     */
    public function all(string|Stringable|null $filter = null): LazyCollection
    {
        return $this->each(new GetBulletinsRequest(filter: $filter), Bulletin::class);
    }

    /**
     * @param  \spkm\IsamsApi\Data\Bulletin\BulletinForCreate|array<string, mixed>  $bulletin
     * @see \spkm\IsamsApi\Requests\Bulletin\CreateBulletinRequest
     */
    public function create(BulletinForCreate|array $bulletin): Created
    {
        return $this->fetch(new CreateBulletinRequest(bulletin: $bulletin));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\Bulletin\Bulletin>
     * @see \spkm\IsamsApi\Requests\Bulletin\GetBulletinsByGroupRequest
     */
    public function getByGroup(int $groupId): Collection
    {
        return $this->fetch(new GetBulletinsByGroupRequest(groupId: $groupId));
    }
}
