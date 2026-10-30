<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\Storage;

use Saloon\Data\MultipartValue;
use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\Storage\Files\DeleteFileRequest;
use spkm\IsamsApi\Requests\Storage\Files\DownloadFileRequest;
use spkm\IsamsApi\Requests\Storage\Files\UploadFileRequest;

class FilesResource extends BaseResource
{
    public function deleteFile(string $path, string $filename): Response
    {
        return $this->connector->send(new DeleteFileRequest($path, $filename));
    }

    public function downloadFile(string $path, string $fileName): Response
    {
        return $this->connector->send(new DownloadFileRequest($path, $fileName));
    }

    public function uploadFile(
        string $key,
        MultipartValue $file,
        string $filename,
        string $path,
        ?bool $overwrite = null,
    ): Response {
        return $this->connector->send(new UploadFileRequest($key, $file, $filename, $path, $overwrite));
    }
}
