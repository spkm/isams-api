<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\Bulletin;

use DateTimeInterface;
use Illuminate\Support\LazyCollection;
use Stringable;
use spkm\IsamsApi\Data\Bulletin\Bulletin;
use spkm\IsamsApi\Requests\CloudPortals\Bulletin\DailyBulletin\GetPortalDailyBulletinsByYearRequest;
use spkm\IsamsApi\Requests\CloudPortals\Bulletin\DailyBulletin\GetPortalDailyBulletinsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class DailyBulletinResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\LazyCollection<int, \spkm\IsamsApi\Data\Bulletin\Bulletin>
     * @see \spkm\IsamsApi\Requests\CloudPortals\Bulletin\DailyBulletin\GetPortalDailyBulletinsRequest
     */
    public function all(string|Stringable|null $filter = null): LazyCollection
    {
        return $this->each(new GetPortalDailyBulletinsRequest(filter: $filter), Bulletin::class);
    }

    /**
     * @return \Illuminate\Support\LazyCollection<int, \spkm\IsamsApi\Data\Bulletin\Bulletin>
     * @see \spkm\IsamsApi\Requests\CloudPortals\Bulletin\DailyBulletin\GetPortalDailyBulletinsByYearRequest
     */
    public function getByYear(DateTimeInterface|string $date, ?string $yearGroups = null): LazyCollection
    {
        return $this->each(new GetPortalDailyBulletinsByYearRequest(date: $date, yearGroups: $yearGroups), Bulletin::class);
    }
}
