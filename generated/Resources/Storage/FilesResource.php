<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Storage;

use Saloon\Data\MultipartValue;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\File;
use spkm\IsamsApi\Requests\Storage\Files\DeleteFileRequest;
use spkm\IsamsApi\Requests\Storage\Files\DownloadFileRequest;
use spkm\IsamsApi\Requests\Storage\Files\UploadFileRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class FilesResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\Storage\Files\DeleteFileRequest
     */
    public function delete(string $path, string $filename): void
    {
        $this->fetch(new DeleteFileRequest(path: $path, filename: $filename));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Storage\Files\DownloadFileRequest
     */
    public function download(string $path, string $fileName): File
    {
        return $this->fetch(new DownloadFileRequest(path: $path, fileName: $fileName));
    }

    /**
     * @see \spkm\IsamsApi\Requests\Storage\Files\UploadFileRequest
     */
    public function upload(
        string $key,
        MultipartValue $file,
        string $filename,
        string $path,
        ?bool $overwrite = null,
    ): Created {
        return $this->fetch(new UploadFileRequest(key: $key, file: $file, filename: $filename, path: $path, overwrite: $overwrite));
    }
}
