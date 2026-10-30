<?php

namespace spkm\IsamsApi\Tests\Fixtures;

use Carbon\CarbonImmutable;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class ExampleStudent extends Data
{
    protected const LISTS = ['addresses' => ExampleAddress::class];

    /**
     * @param  Collection<int, ExampleAddress>  $addresses
     * @param  list<string>  $languages
     * @param  array<string, mixed>|null  $extra
     */
    public function __construct(
        public ?int $id = null,
        public ?string $forename = null,
        public ?bool $boarder = null,
        public ?float $fee = null,
        public ?CarbonImmutable $dob = null,
        public ?ExampleAddress $home = null,
        public Collection $addresses = new Collection,
        public array $languages = [],
        public ?array $extra = null,
    ) {}
}
