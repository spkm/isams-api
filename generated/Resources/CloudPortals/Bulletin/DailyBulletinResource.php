<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\Bulletin;

use DateTimeInterface;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Stringable;
use spkm\IsamsApi\Requests\CloudPortals\Bulletin\DailyBulletin\GetPortalDailyBulletinsByYearRequest;
use spkm\IsamsApi\Requests\CloudPortals\Bulletin\DailyBulletin\GetPortalDailyBulletinsRequest;

class DailyBulletinResource extends BaseResource
{
    public function all(?int $page = null, ?int $pageSize = null, string|Stringable|null $filter = null): Response
    {
        return $this->connector->send(new GetPortalDailyBulletinsRequest($page, $pageSize, $filter));
    }

    public function getByYear(
        DateTimeInterface|string $date,
        ?string $yearGroups = null,
        ?int $page = null,
        ?int $pageSize = null,
    ): Response {
        return $this->connector->send(new GetPortalDailyBulletinsByYearRequest($date, $yearGroups, $page, $pageSize));
    }
}
