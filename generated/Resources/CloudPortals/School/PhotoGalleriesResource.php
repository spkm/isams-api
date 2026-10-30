<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\CloudPortals\PhotoGallery;
use spkm\IsamsApi\Data\File;
use spkm\IsamsApi\Requests\CloudPortals\School\PhotoGalleries\GetPhotoGalleriesRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\PhotoGalleries\GetPhotoGalleryImageRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\PhotoGalleries\GetPhotoGalleryRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class PhotoGalleriesResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\CloudPortals\PhotoGallery>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\PhotoGalleries\GetPhotoGalleriesRequest
     */
    public function all(): Collection
    {
        return $this->fetch(new GetPhotoGalleriesRequest());
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\PhotoGalleries\GetPhotoGalleryRequest
     */
    public function get(int $galleryId): PhotoGallery
    {
        return $this->fetch(new GetPhotoGalleryRequest(galleryId: $galleryId));
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\PhotoGalleries\GetPhotoGalleryImageRequest
     */
    public function getImage(int $galleryId, int $imageId): File
    {
        return $this->fetch(new GetPhotoGalleryImageRequest(galleryId: $galleryId, imageId: $imageId));
    }
}
