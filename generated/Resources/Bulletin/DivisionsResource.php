<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Bulletin;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\Bulletin\BulletinDivisionsForCreate;
use spkm\IsamsApi\Requests\Bulletin\Divisions\CreateBulletinDivisionsRequest;

class DivisionsResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\Bulletin\BulletinDivisionsForCreate|array<string, mixed>  $bulletinDivisions
     */
    public function createMany(int $bulletinId, BulletinDivisionsForCreate|array $bulletinDivisions): Response
    {
        return $this->connector->send(new CreateBulletinDivisionsRequest($bulletinId, $bulletinDivisions));
    }
}
