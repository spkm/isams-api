<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Bulletin;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\Bulletin\BulletinYearGroupsForCreate;
use spkm\IsamsApi\Requests\Bulletin\YearGroup\CreateBulletinYearGroupsRequest;

class YearGroupResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\Bulletin\BulletinYearGroupsForCreate|array<string, mixed>  $bulletinYearGroups
     */
    public function createBulletinYearGroups(
        int $bulletinId,
        BulletinYearGroupsForCreate|array $bulletinYearGroups,
    ): Response {
        return $this->connector->send(new CreateBulletinYearGroupsRequest($bulletinId, $bulletinYearGroups));
    }
}
