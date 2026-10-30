<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\StudentRegisters;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\StudentRegisters\ScreeningLogs\GetScreeningLogsRequest;

class ScreeningLogsResource extends BaseResource
{
    public function all(int $registerId, string $schoolId): Response
    {
        return $this->connector->send(new GetScreeningLogsRequest($registerId, $schoolId));
    }
}
