<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\Students;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\Data;

readonly class TeachingGroupsHistoryCollection extends Data
{
    protected const LISTS = [
        'teachingGroupAdditionHistory' => TeachingGroupAdditionHistory::class,
        'teachingGroupDeletedHistory' => TeachingGroupDeletedHistory::class,
        'teachingGroupMovedHistory' => TeachingGroupMovedHistory::class,
    ];

    /**
     * @param  Collection<int, TeachingGroupAdditionHistory>  $teachingGroupAdditionHistory
     * @param  Collection<int, TeachingGroupDeletedHistory>  $teachingGroupDeletedHistory
     * @param  Collection<int, TeachingGroupMovedHistory>  $teachingGroupMovedHistory
     */
    public function __construct(
        public Collection $teachingGroupAdditionHistory = new Collection,
        public Collection $teachingGroupDeletedHistory = new Collection,
        public Collection $teachingGroupMovedHistory = new Collection,
    ) {
    }
}
