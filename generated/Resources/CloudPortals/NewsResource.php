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
    public function all(?int $page = null, ?int $pageSize = null, string|Stringable|null $filter = null): Response
    {
        return $this->connector->send(new GetPortalNewsRequest($page, $pageSize, $filter));
    }

    public function getArticle(int $id): Response
    {
        return $this->connector->send(new GetNewsArticleRequest($id));
    }

    public function getCategories(): Response
    {
        return $this->connector->send(new GetNewsCategoriesRequest());
    }

    public function getOptions(): Response
    {
        return $this->connector->send(new GetNewsOptionsRequest());
    }
}
