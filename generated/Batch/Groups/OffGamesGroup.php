<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Batch\Groups;

use Illuminate\Support\LazyCollection;
use spkm\IsamsApi\Batch\BatchGroup;
use spkm\IsamsApi\Data\Batch\OffGames\OffGamesList\OffGames;

class OffGamesGroup extends BatchGroup
{
    /**
     * @return LazyCollection<int, OffGames>
     */
    public function all(): LazyCollection
    {
        return $this->run('OffGames_GetAllOffGames', OffGames::class);
    }
}
