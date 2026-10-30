<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Storage\Files;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Deletes the specified by folder and filename.
 *
 * DELETE /api/storage/files
 */
class DeleteFileRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;

    public function __construct(
        protected string $path,
        protected string $filename,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/storage/files';
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return [
            'path' => $this->path,
            'filename' => $this->filename,
        ];
    }
}
