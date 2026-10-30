<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\School\DisciplineRecords;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Students\DetentionRecord;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * GET /api/portals/students/{schoolId}/disciplinerecords/detentionrecords
 */
class GetDisciplineRecordDetentionRecordsForStudentRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = DetentionRecord::class;
    public string $resultKey = 'detentionRecords';

    public function __construct(
        protected string $schoolId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/students/'.rawurlencode((string) $this->schoolId).'/disciplinerecords/detentionrecords';
    }
}
