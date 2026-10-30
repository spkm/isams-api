<?php

namespace spkm\IsamsApi\Data;

use Saloon\Http\Response;

readonly class File
{
    public function __construct(
        public string $contents,
        public ?string $mimeType,
        public ?string $filename,
    ) {}

    public static function fromResponse(Response $response): self
    {
        preg_match('/filename\*?=(?:UTF-8\'\')?"?([^";]+)"?/i', (string) $response->header('Content-Disposition'), $matches);

        return new self($response->body(), $response->header('Content-Type'), isset($matches[1]) ? rawurldecode($matches[1]) : null);
    }

    public function save(string $path): void
    {
        file_put_contents($path, $this->contents);
    }
}
