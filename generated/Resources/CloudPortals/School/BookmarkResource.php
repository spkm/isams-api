<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use Illuminate\Support\LazyCollection;
use Stringable;
use spkm\IsamsApi\Data\CloudPortals\Bookmark;
use spkm\IsamsApi\Data\CloudPortals\BookmarkGroups;
use spkm\IsamsApi\Requests\CloudPortals\School\Bookmark\GetBookmarkGroupsRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Bookmark\GetBookmarksRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class BookmarkResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\LazyCollection<int, \spkm\IsamsApi\Data\CloudPortals\Bookmark>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\Bookmark\GetBookmarksRequest
     */
    public function all(string|Stringable|null $filter = null): LazyCollection
    {
        return $this->each(new GetBookmarksRequest(filter: $filter), Bookmark::class);
    }

    /**
     * @return \Illuminate\Support\LazyCollection<int, \spkm\IsamsApi\Data\CloudPortals\BookmarkGroups>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\Bookmark\GetBookmarkGroupsRequest
     */
    public function getGroups(string|Stringable|null $filter = null): LazyCollection
    {
        return $this->each(new GetBookmarkGroupsRequest(filter: $filter), BookmarkGroups::class);
    }
}
