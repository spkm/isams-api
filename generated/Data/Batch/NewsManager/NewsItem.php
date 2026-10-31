<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Data\Batch\NewsManager;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchData;

readonly class NewsItem extends BatchData
{
    protected const LISTS = ['bookmarks' => Bookmark::class, 'files' => File::class];

    /**
     * @param  Collection<int, Bookmark>  $bookmarks
     * @param  Collection<int, File>  $files
     */
    public function __construct(
        public ?int $id = null,
        public ?string $summary = null,
        public ?string $title = null,
        public ?string $body = null,
        public Collection $bookmarks = new Collection,
        public Collection $files = new Collection,
    ) {
    }
}
