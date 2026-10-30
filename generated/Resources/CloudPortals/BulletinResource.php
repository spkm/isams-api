<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use spkm\IsamsApi\Resources\CloudPortals\Bulletin\DailyBulletinResource;

class BulletinResource extends BaseResource
{
    public function dailyBulletin(): DailyBulletinResource
    {
        return new DailyBulletinResource($this->connector);
    }
}
