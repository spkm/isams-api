<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\PhotoGalleries;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\CloudPortals\PhotoGallery;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/photogalleries
 */
class GetPhotoGalleriesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = PhotoGallery::class;
    public string $resultKey = 'photoGalleries';

    public function resolveEndpoint(): string
    {
        return '/api/portals/photogalleries';
    }
}
