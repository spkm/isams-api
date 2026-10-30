<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Batch\Groups;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchGroup;

class TrackingGroup extends BatchGroup
{
    /**
     * @param  list<int|string>  $idsToInclude
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\TrackingManager\ExternalData\Data>
     */
    public function externalData(array $idsToInclude): Collection
    {
        return $this->run('Tracking_GetExternalData', \spkm\IsamsApi\Data\Batch\TrackingManager\ExternalData\Data::class, ['module' => 'TrackingManager', 'element' => 'ExternalData', 'attributes' => ['IDsToInclude' => $idsToInclude], 'required' => true]);
    }

    /**
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\TrackingManager\ExternalDataList\Data>
     */
    public function externalDataList(): Collection
    {
        return $this->run('Tracking_GetExternalDataList', \spkm\IsamsApi\Data\Batch\TrackingManager\ExternalDataList\Data::class);
    }
}
