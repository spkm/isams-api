<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use spkm\IsamsApi\Resources\CloudPortals\Bulletin\DailyBulletinResource;
use spkm\IsamsApi\Resources\IsamsResource;

class BulletinResource extends IsamsResource
{
    public function dailyBulletin(): DailyBulletinResource
    {
        return new DailyBulletinResource($this->connector);
    }
}
