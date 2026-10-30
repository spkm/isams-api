<?php

namespace spkm\IsamsApi\Tests\Fixtures;

use spkm\IsamsApi\Data\Data;

readonly class ExampleRequiredName extends Data
{
    public function __construct(
        public string $name,
        public ?string $note = null,
    ) {}
}
