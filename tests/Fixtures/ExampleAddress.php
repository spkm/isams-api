<?php

namespace spkm\IsamsApi\Tests\Fixtures;

use spkm\IsamsApi\Data\Data;

readonly class ExampleAddress extends Data
{
    public function __construct(
        public ?string $town = null,
        public ?string $postcode = null,
    ) {}
}
