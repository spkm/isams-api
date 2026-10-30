<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use Stringable;
use spkm\IsamsApi\Requests\SystemConfiguration\Sms\GetSmsBatchMessagesRequest;

class SmsResource extends BaseResource
{
    public function getSmsBatchMessages(
        ?int $page = null,
        ?int $pageSize = null,
        string|Stringable|null $filter = null,
    ): Response {
        return $this->connector->send(new GetSmsBatchMessagesRequest($page, $pageSize, $filter));
    }
}
