<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Storage\Files;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Downloads the file.
 *
 * GET /api/storage/files/download
 */
class DownloadFileRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::FILE;

    public function __construct(
        protected string $path,
        protected string $fileName,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/storage/files/download';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return [
            'path' => $this->path,
            'fileName' => $this->fileName,
        ];
    }
}
