<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\School\PhotoGalleries\GetPhotoGalleriesRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\PhotoGalleries\GetPhotoGalleryImageRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\PhotoGalleries\GetPhotoGalleryRequest;

class SchoolPhotoGalleriesResource extends BaseResource
{
    public function getPhotoGalleries(): Response
    {
        return $this->connector->send(new GetPhotoGalleriesRequest());
    }

    public function getPhotoGallery(int $galleryId): Response
    {
        return $this->connector->send(new GetPhotoGalleryRequest($galleryId));
    }

    public function getPhotoGalleryImage(int $galleryId, int $imageId): Response
    {
        return $this->connector->send(new GetPhotoGalleryImageRequest($galleryId, $imageId));
    }
}
