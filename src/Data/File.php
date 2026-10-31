<?php

namespace spkm\IsamsApi\Data;

use Illuminate\Support\Str;
use Saloon\Http\Response;

readonly class File
{
    public function __construct(
        public string $contents,
        public ?string $mimeType,
        public ?string $filename,
    ) {}

    /**
     * The file iSAMS sent, named as its Content-Disposition header names it, without any directory, so that the name
     * can't point outside the folder you save it in.
     */
    public static function fromResponse(Response $response): self
    {
        preg_match('/filename\*?=(?:UTF-8\'\')?"?([^";]+)"?/i', (string) $response->header('Content-Disposition'), $matches);
        $filename = isset($matches[1]) ? Str::afterLast(str_replace('\\', '/', rawurldecode($matches[1])), '/') : '';

        return new self($response->body(), $response->header('Content-Type'), in_array($filename, ['', '.', '..'], true) ? null : $filename);
    }

    public function save(string $path): void
    {
        file_put_contents($path, $this->contents);
    }
}
