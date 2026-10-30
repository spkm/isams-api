<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources;

use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\News\NewsForCreate;
use spkm\IsamsApi\Requests\News\CreateNewsRequest;

class NewsResource extends IsamsResource
{
    /**
     * @param  \spkm\IsamsApi\Data\News\NewsForCreate|array<string, mixed>  $news
     * @see \spkm\IsamsApi\Requests\News\CreateNewsRequest
     */
    public function create(NewsForCreate|array $news): Created
    {
        return $this->fetch(new CreateNewsRequest(news: $news));
    }
}
