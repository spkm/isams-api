<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\WellbeingManager;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class RuleForCreate extends Data
{
    protected const LISTS = ['parameterValues' => RuleParameterValueForCreate::class];

    /**
     * @param  Collection<int, RuleParameterValueForCreate>|null  $parameterValues
     */
    public function __construct(
        public string $name,
        public string $type,
        public ?int $id = null,
        public ?Collection $parameterValues = null,
    ) {
    }
}
