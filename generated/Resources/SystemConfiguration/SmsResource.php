<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration;

use Illuminate\Support\LazyCollection;
use Stringable;
use spkm\IsamsApi\Data\SystemConfiguration\SmsBatch;
use spkm\IsamsApi\Requests\SystemConfiguration\Sms\GetSmsBatchMessagesRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class SmsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\LazyCollection<int, \spkm\IsamsApi\Data\SystemConfiguration\SmsBatch>
     * @see \spkm\IsamsApi\Requests\SystemConfiguration\Sms\GetSmsBatchMessagesRequest
     */
    public function getBatchMessages(string|Stringable|null $filter = null): LazyCollection
    {
        return $this->each(new GetSmsBatchMessagesRequest(filter: $filter), SmsBatch::class);
    }
}
