<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Storage\Files;

use Saloon\Contracts\Body\HasBody;
use Saloon\Data\MultipartValue;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasMultipartBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Uploads a file.
 *
 * POST /api/storage/files/upload/{key}
 */
class UploadFileRequest extends IsamsRequest implements HasBody
{
    use HasMultipartBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    public function __construct(
        protected string $key,
        protected MultipartValue $file,
        protected string $filename,
        protected string $path,
        protected ?bool $overwrite = null,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/storage/files/upload/'.rawurlencode((string) $this->key);
    }

    /**
     * @return array<string, mixed>
     */
    protected function defaultQuery(): array
    {
        return array_filter([
            'filename' => $this->filename,
            'path' => $this->path,
            'overwrite' => $this->overwrite === null ? null : ($this->overwrite ? 'true' : 'false'),
        ], fn (mixed $value) => $value !== null);
    }

    /**
     * @return list<MultipartValue>
     */
    protected function defaultBody(): array
    {
        return [$this->file];
    }
}
