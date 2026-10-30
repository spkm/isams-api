<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\School\PhotoGalleries\GetPhotoGalleriesRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\PhotoGalleries\GetPhotoGalleryImageRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\PhotoGalleries\GetPhotoGalleryRequest;

class PhotoGalleriesResource extends BaseResource
{
    public function all(): Response
    {
        return $this->connector->send(new GetPhotoGalleriesRequest());
    }

    public function get(int $galleryId): Response
    {
        return $this->connector->send(new GetPhotoGalleryRequest($galleryId));
    }

    public function getImage(int $galleryId, int $imageId): Response
    {
        return $this->connector->send(new GetPhotoGalleryImageRequest($galleryId, $imageId));
    }
}
