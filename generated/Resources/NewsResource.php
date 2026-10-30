<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\News\NewsForCreate;
use spkm\IsamsApi\Requests\News\CreateNewsRequest;

class NewsResource extends BaseResource
{
    /**
     * @param  \spkm\IsamsApi\Data\News\NewsForCreate|array<string, mixed>  $news
     */
    public function create(NewsForCreate|array $news): Response
    {
        return $this->connector->send(new CreateNewsRequest($news));
    }
}
