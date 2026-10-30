<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration;

use Illuminate\Support\Collection;
use Stringable;
use spkm\IsamsApi\Requests\SystemConfiguration\Sms\GetSmsBatchMessagesRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class SmsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\SystemConfiguration\SmsBatch>
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\Sms\GetSmsBatchMessagesRequest
     */
    public function getBatchMessages(
        ?int $page = null,
        ?int $pageSize = null,
        string|Stringable|null $filter = null,
    ): Collection {
        return $this->fetch(new GetSmsBatchMessagesRequest(page: $page, pageSize: $pageSize, filter: $filter));
    }
}
