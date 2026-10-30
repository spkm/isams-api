<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Stringable;
use spkm\IsamsApi\Requests\CloudPortals\School\Bookmark\GetBookmarkGroupsRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Bookmark\GetBookmarksRequest;

class SchoolBookmarkResource extends BaseResource
{
    public function getBookmarkGroups(
        ?int $page = null,
        ?int $pageSize = null,
        string|Stringable|null $filter = null,
    ): Response {
        return $this->connector->send(new GetBookmarkGroupsRequest($page, $pageSize, $filter));
    }

    public function getBookmarks(
        ?int $page = null,
        ?int $pageSize = null,
        string|Stringable|null $filter = null,
    ): Response {
        return $this->connector->send(new GetBookmarksRequest($page, $pageSize, $filter));
    }
}
