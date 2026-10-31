<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Batch\Groups;

use Illuminate\Support\LazyCollection;
use spkm\IsamsApi\Batch\BatchGroup;
use spkm\IsamsApi\Data\Batch\NewsManager\Categories\Category;
use spkm\IsamsApi\Data\Batch\NewsManager\NewsItem;

class NewsGroup extends BatchGroup
{
    /**
     * @return LazyCollection<int, NewsItem>
     */
    public function active(): LazyCollection
    {
        return $this->run('News_GetActiveNews', NewsItem::class);
    }

    /**
     * @return LazyCollection<int, NewsItem>
     */
    public function archived(): LazyCollection
    {
        return $this->run('News_GetArchivedNews', NewsItem::class);
    }

    /**
     * @return LazyCollection<int, NewsItem>
     */
    public function future(): LazyCollection
    {
        return $this->run('News_GetFutureNews', NewsItem::class);
    }

    /**
     * @return LazyCollection<int, Category>
     */
    public function types(): LazyCollection
    {
        return $this->run('News_GetNewsTypes', Category::class);
    }
}
