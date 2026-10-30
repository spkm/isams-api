<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\CloudPortals;

use spkm\IsamsApi\Data\Data;

readonly class PhotoGalleryImage extends Data
{
    public function __construct(
        public ?string $fileName = null,
        public ?string $format = null,
        public ?int $height = null,
        public ?int $imageId = null,
        public ?int $size = null,
        public ?int $width = null,
    ) {
    }
}
