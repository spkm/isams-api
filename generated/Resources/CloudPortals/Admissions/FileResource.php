<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\Admissions;

use spkm\IsamsApi\Data\File;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\File\DownloadFileRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\File\FileExistsRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\File\GetFileLogoRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class FileResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\Admissions\File\DownloadFileRequest
     */
    public function download(string $filePath): File
    {
        return $this->fetch(new DownloadFileRequest(filePath: $filePath));
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\Admissions\File\FileExistsRequest
     */
    public function exists(string $path, string $filename): mixed
    {
        return $this->fetch(new FileExistsRequest(path: $path, filename: $filename));
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\Admissions\File\GetFileLogoRequest
     */
    public function getLogo(): File
    {
        return $this->fetch(new GetFileLogoRequest());
    }
}
