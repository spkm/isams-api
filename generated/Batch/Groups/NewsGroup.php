<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Batch\Groups;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchGroup;
use spkm\IsamsApi\Data\Batch\NewsManager\Categories\Category;

class NewsGroup extends BatchGroup
{
    /**
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\NewsManager\ActiveNews\NewsItem>
     */
    public function active(): Collection
    {
        return $this->run('News_GetActiveNews', \spkm\IsamsApi\Data\Batch\NewsManager\ActiveNews\NewsItem::class);
    }

    /**
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\NewsManager\ArchivedNews\NewsItem>
     */
    public function archived(): Collection
    {
        return $this->run('News_GetArchivedNews', \spkm\IsamsApi\Data\Batch\NewsManager\ArchivedNews\NewsItem::class);
    }

    /**
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\NewsManager\FutureNews\NewsItem>
     */
    public function future(): Collection
    {
        return $this->run('News_GetFutureNews', \spkm\IsamsApi\Data\Batch\NewsManager\FutureNews\NewsItem::class);
    }

    /**
     * @return Collection<int, Category>
     */
    public function types(): Collection
    {
        return $this->run('News_GetNewsTypes', Category::class);
    }
}
