<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\File\DownloadFileRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\File\FileExistsRequest;
use spkm\IsamsApi\Requests\CloudPortals\Admissions\File\GetFileLogoRequest;

class AdmissionsFileResource extends BaseResource
{
    public function downloadFile(string $filePath): Response
    {
        return $this->connector->send(new DownloadFileRequest($filePath));
    }

    public function fileExists(string $path, string $filename): Response
    {
        return $this->connector->send(new FileExistsRequest($path, $filename));
    }

    public function getFileLogo(): Response
    {
        return $this->connector->send(new GetFileLogoRequest());
    }
}
