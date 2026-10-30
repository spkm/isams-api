<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Illuminate\Support\LazyCollection;
use Stringable;
use spkm\IsamsApi\Data\News\News;
use spkm\IsamsApi\Requests\CloudPortals\News\GetNewsArticleRequest;
use spkm\IsamsApi\Requests\CloudPortals\News\GetNewsCategoriesRequest;
use spkm\IsamsApi\Requests\CloudPortals\News\GetNewsOptionsRequest;
use spkm\IsamsApi\Requests\CloudPortals\News\GetPortalNewsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class NewsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\LazyCollection<int, \spkm\IsamsApi\Data\News\News>
     * @see \spkm\IsamsApi\Requests\CloudPortals\News\GetPortalNewsRequest
     */
    public function all(string|Stringable|null $filter = null): LazyCollection
    {
        return $this->each(new GetPortalNewsRequest(filter: $filter), News::class);
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\News\GetNewsArticleRequest
     */
    public function getArticle(int $id): mixed
    {
        return $this->fetch(new GetNewsArticleRequest(id: $id));
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\News\GetNewsCategoriesRequest
     */
    public function getCategories(): mixed
    {
        return $this->fetch(new GetNewsCategoriesRequest());
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\News\GetNewsOptionsRequest
     */
    public function getOptions(): mixed
    {
        return $this->fetch(new GetNewsOptionsRequest());
    }
}
