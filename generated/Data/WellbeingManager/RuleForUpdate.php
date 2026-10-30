<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\WellbeingManager;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class RuleForUpdate extends Data
{
    protected const LISTS = ['parameterValues' => RuleParameterValueForUpdate::class];

    /**
     * @param  Collection<int, RuleParameterValueForUpdate>|null  $parameterValues
     */
    public function __construct(
        public string $name,
        public string $type,
        public ?int $id = null,
        public ?Collection $parameterValues = null,
    ) {
    }
}
