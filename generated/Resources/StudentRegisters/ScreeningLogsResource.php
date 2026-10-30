<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\StudentRegisters;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Requests\StudentRegisters\ScreeningLogs\GetScreeningLogsRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class ScreeningLogsResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\StudentRegisters\StudentScreeningLog>
     * @see \spkm\IsamsApi\Requests\StudentRegisters\ScreeningLogs\GetScreeningLogsRequest
     */
    public function all(int $registerId, string $schoolId): Collection
    {
        return $this->fetch(new GetScreeningLogsRequest(registerId: $registerId, schoolId: $schoolId));
    }
}
