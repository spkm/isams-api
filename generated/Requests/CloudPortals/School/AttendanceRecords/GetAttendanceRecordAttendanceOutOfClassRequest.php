<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\AttendanceRecords;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Students\AttendanceRecord;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/students/{schoolId}/terms/{termId}/attendancerecords/outofclass
 */
class GetAttendanceRecordAttendanceOutOfClassRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = AttendanceRecord::class;
    public string $resultKey = 'attendanceRecords';

    public function __construct(
        protected string $schoolId,
        protected int $termId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/students/'.rawurlencode((string) $this->schoolId).'/terms/'.rawurlencode((string) $this->termId).'/attendancerecords/outofclass';
    }
}
