<?php

namespace spkm\IsamsApi\Data;

use Saloon\Http\Response;

readonly class Created
{
    public function __construct(
        public ?string $location,
        public ?string $id,
    ) {}

    public static function fromResponse(Response $response): self
    {
        $location = $response->header('Location');
        $id = $location ? basename((string) parse_url($location, PHP_URL_PATH)) : null;

        return new self($location, $id ?: null);
    }
}
