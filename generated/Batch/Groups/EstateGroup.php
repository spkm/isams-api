<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Batch\Groups;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchGroup;
use spkm\IsamsApi\Data\Batch\EstateManager\Buildings\Building;

class EstateGroup extends BatchGroup
{
    /**
     * @return Collection<int, Building>
     */
    public function buildingsAndClassrooms(): Collection
    {
        return $this->run('Estate_GetAllBuildingsAndClassrooms', Building::class);
    }
}
