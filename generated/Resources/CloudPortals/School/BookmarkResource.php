<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Stringable;
use spkm\IsamsApi\Requests\CloudPortals\School\Bookmark\GetBookmarkGroupsRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\Bookmark\GetBookmarksRequest;

class BookmarkResource extends BaseResource
{
    public function all(?int $page = null, ?int $pageSize = null, string|Stringable|null $filter = null): Response
    {
        return $this->connector->send(new GetBookmarksRequest($page, $pageSize, $filter));
    }

    public function getGroups(
        ?int $page = null,
        ?int $pageSize = null,
        string|Stringable|null $filter = null,
    ): Response {
        return $this->connector->send(new GetBookmarkGroupsRequest($page, $pageSize, $filter));
    }
}
