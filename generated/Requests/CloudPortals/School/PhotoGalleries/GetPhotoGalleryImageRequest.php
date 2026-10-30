<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\PhotoGalleries;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/photogalleries/{galleryId}/images/{imageId}
 */
class GetPhotoGalleryImageRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::FILE;

    public function __construct(
        protected int $galleryId,
        protected int $imageId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/photogalleries/'.rawurlencode((string) $this->galleryId).'/images/'.rawurlencode((string) $this->imageId);
    }
}
