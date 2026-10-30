<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\StudentRegisters\RecordCollection;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\StudentRegisters\Record;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves records for a register, student and record collection
 *
 * GET /api/registers/{registerId}/students/{schoolId}/recordcollections/{recordCollectionId}/records
 */
class GetStudentRecordCollectionRecordsRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = Record::class;
    public string $resultKey = 'records';

    public function __construct(
        protected int $registerId,
        protected string $schoolId,
        protected int $recordCollectionId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/registers/'.rawurlencode((string) $this->registerId).'/students/'.rawurlencode((string) $this->schoolId).'/recordcollections/'.rawurlencode((string) $this->recordCollectionId).'/records';
    }
}
