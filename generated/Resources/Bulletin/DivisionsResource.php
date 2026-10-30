<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Bulletin;

use spkm\IsamsApi\Data\Bulletin\BulletinDivisionsForCreate;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Requests\Bulletin\Divisions\CreateBulletinDivisionsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class DivisionsResource extends IsamsResource
{
    /**
     * @param  \spkm\IsamsApi\Data\Bulletin\BulletinDivisionsForCreate|array<string, mixed>  $bulletinDivisions
     * @see \spkm\IsamsApi\Requests\Bulletin\Divisions\CreateBulletinDivisionsRequest
     */
    public function createMany(int $bulletinId, BulletinDivisionsForCreate|array $bulletinDivisions): Created
    {
        return $this->fetch(new CreateBulletinDivisionsRequest(bulletinId: $bulletinId, bulletinDivisions: $bulletinDivisions));
    }
}
