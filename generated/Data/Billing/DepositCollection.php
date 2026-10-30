<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Billing;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class DepositCollection extends Data
{
    protected const LISTS = ['deposits' => Deposit::class];

    /**
     * @param  Collection<int, Deposit>  $deposits
     */
    public function __construct(
        public ?int $currencyPlaces = null,
        public ?string $currencySymbol = null,
        public Collection $deposits = new Collection,
    ) {
    }
}
