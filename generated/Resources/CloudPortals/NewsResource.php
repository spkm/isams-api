<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Stringable;
use spkm\IsamsApi\Requests\CloudPortals\News\GetNewsArticleRequest;
use spkm\IsamsApi\Requests\CloudPortals\News\GetNewsCategoriesRequest;
use spkm\IsamsApi\Requests\CloudPortals\News\GetNewsOptionsRequest;
use spkm\IsamsApi\Requests\CloudPortals\News\GetPortalNewsRequest;

class NewsResource extends BaseResource
{
    public function getNewsArticle(int $id): Response
    {
        return $this->connector->send(new GetNewsArticleRequest($id));
    }

    public function getNewsCategories(): Response
    {
        return $this->connector->send(new GetNewsCategoriesRequest());
    }

    public function getNewsOptions(): Response
    {
        return $this->connector->send(new GetNewsOptionsRequest());
    }

    public function getPortalNews(
        ?int $page = null,
        ?int $pageSize = null,
        string|Stringable|null $filter = null,
    ): Response {
        return $this->connector->send(new GetPortalNewsRequest($page, $pageSize, $filter));
    }
}
