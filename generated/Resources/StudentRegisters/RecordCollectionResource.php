<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\StudentRegisters;

use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Data\StudentRegisters\StudentRecords;
use spkm\IsamsApi\Requests\StudentRegisters\RecordCollection\CreateRecordCollectionRecordRequest;
use spkm\IsamsApi\Requests\StudentRegisters\RecordCollection\DeleteRecordCollectionRecordRequest;
use spkm\IsamsApi\Requests\StudentRegisters\RecordCollection\GetRecordCollectionRecordsRequest;
use spkm\IsamsApi\Requests\StudentRegisters\RecordCollection\GetStudentRecordCollectionRecordsRequest;
use spkm\IsamsApi\Requests\StudentRegisters\RecordCollection\PatchRecordCollectionRecordRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class RecordCollectionResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\LazyCollection<int, \spkm\IsamsApi\Data\StudentRegisters\StudentRecords>
     * @see \spkm\IsamsApi\Requests\StudentRegisters\RecordCollection\GetRecordCollectionRecordsRequest
     */
    public function all(int $registerId, int $recordCollectionId, ?string $systemStatus = null): LazyCollection
    {
        return $this->each(new GetRecordCollectionRecordsRequest(registerId: $registerId, recordCollectionId: $recordCollectionId, systemStatus: $systemStatus), StudentRecords::class);
    }

    /**
     * @param  array<mixed>  $values
     * @see \spkm\IsamsApi\Requests\StudentRegisters\RecordCollection\CreateRecordCollectionRecordRequest
     */
    public function create(int $registerId, string $schoolId, int $recordCollectionId, array $values): Created
    {
        return $this->fetch(new CreateRecordCollectionRecordRequest(registerId: $registerId, schoolId: $schoolId, recordCollectionId: $recordCollectionId, values: $values));
    }

    /**
     * @see \spkm\IsamsApi\Requests\StudentRegisters\RecordCollection\DeleteRecordCollectionRecordRequest
     */
    public function delete(int $registerId, string $schoolId, int $recordCollectionId, int $recordId): bool
    {
        $this->fetch(new DeleteRecordCollectionRecordRequest(registerId: $registerId, schoolId: $schoolId, recordCollectionId: $recordCollectionId, recordId: $recordId));

        return true;
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\StudentRegisters\Record>
     * @see \spkm\IsamsApi\Requests\StudentRegisters\RecordCollection\GetStudentRecordCollectionRecordsRequest
     */
    public function forStudent(int $registerId, string $schoolId, int $recordCollectionId): Collection
    {
        return $this->fetch(new GetStudentRecordCollectionRecordsRequest(registerId: $registerId, schoolId: $schoolId, recordCollectionId: $recordCollectionId));
    }

    /**
     * @param  array<mixed>  $values
     * @see \spkm\IsamsApi\Requests\StudentRegisters\RecordCollection\PatchRecordCollectionRecordRequest
     */
    public function patch(
        int $registerId,
        string $schoolId,
        int $recordCollectionId,
        int $recordId,
        array $values,
    ): bool {
        $this->fetch(new PatchRecordCollectionRecordRequest(registerId: $registerId, schoolId: $schoolId, recordCollectionId: $recordCollectionId, recordId: $recordId, values: $values));

        return true;
    }
}
