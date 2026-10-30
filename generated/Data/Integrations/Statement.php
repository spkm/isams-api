<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Integrations;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class Statement extends Data
{
    protected const LISTS = ['transactions' => Transaction::class];

    /**
     * @param  list<string>  $studentNames
     * @param  Collection<int, Transaction>  $transactions
     */
    public function __construct(
        public ?StatementConfig $config = null,
        public ?StatementHeader $header = null,
        public array $studentNames = [],
        public Collection $transactions = new Collection,
    ) {
    }
}
