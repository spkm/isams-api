<?php

namespace spkm\IsamsApi\Traits;

use Illuminate\Support\Facades\Log;

trait ApiErrorHandling
{
    protected function responseIsAnError(array $json): bool
    {
        return isset($json['message']) && ! empty($json['message']);
    }

    protected function logApiError(array $json, array $context): void
    {
        Log::error($json['message'], $context);
    }
}
