<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Bulletin;

use spkm\IsamsApi\Data\Bulletin\BulletinYearGroupsForCreate;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Requests\Bulletin\YearGroup\CreateBulletinYearGroupsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class YearGroupResource extends IsamsResource
{
    /**
     * @param  \spkm\IsamsApi\Data\Bulletin\BulletinYearGroupsForCreate|array<string, mixed>  $bulletinYearGroups
     * @see \spkm\IsamsApi\Requests\Bulletin\YearGroup\CreateBulletinYearGroupsRequest
     */
    public function createMany(int $bulletinId, BulletinYearGroupsForCreate|array $bulletinYearGroups): Created
    {
        return $this->fetch(new CreateBulletinYearGroupsRequest(bulletinId: $bulletinId, bulletinYearGroups: $bulletinYearGroups));
    }
}
