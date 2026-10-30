<?php

namespace spkm\IsamsApi;

use RuntimeException;
use Saloon\Exceptions\Request\FatalRequestException;
use Saloon\Http\PendingRequest;

class IsamsUnavailable extends FatalRequestException
{
    public static function for(PendingRequest $pendingRequest): self
    {
        return new self(new RuntimeException('iSAMS has failed repeatedly, so requests are paused for a short while.'), $pendingRequest);
    }
}
