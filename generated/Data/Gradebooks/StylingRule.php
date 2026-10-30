<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Gradebooks;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class StylingRule extends Data
{
    protected const LISTS = ['stylingRuleItems' => StylingRuleItemBase::class];

    /**
     * @param  Collection<int, StylingRuleItemBase>  $stylingRuleItems
     */
    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public Collection $stylingRuleItems = new Collection,
    ) {
    }
}
