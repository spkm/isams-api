<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\CloudPortals;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class PhotoGallery extends Data
{
    protected const LISTS = ['images' => PhotoGalleryImage::class];

    /**
     * @param  Collection<int, PhotoGalleryImage>  $images
     */
    public function __construct(
        public ?int $id = null,
        public ?string $description = null,
        public Collection $images = new Collection,
        public ?string $name = null,
        public ?string $path = null,
        public ?int $pictureCount = null,
    ) {
    }
}
