<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\StudentRegisters;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\StudentRegisters\RecordCollection\CreateRecordCollectionRecordRequest;
use spkm\IsamsApi\Requests\StudentRegisters\RecordCollection\DeleteRecordCollectionRecordRequest;
use spkm\IsamsApi\Requests\StudentRegisters\RecordCollection\GetRecordCollectionRecordsRequest;
use spkm\IsamsApi\Requests\StudentRegisters\RecordCollection\GetStudentRecordCollectionRecordsRequest;
use spkm\IsamsApi\Requests\StudentRegisters\RecordCollection\PatchRecordCollectionRecordRequest;

class RecordCollectionResource extends BaseResource
{
    public function all(
        int $registerId,
        int $recordCollectionId,
        ?string $systemStatus = null,
        ?int $page = null,
        ?int $pageSize = null,
    ): Response {
        return $this->connector->send(new GetRecordCollectionRecordsRequest($registerId, $recordCollectionId, $systemStatus, $page, $pageSize));
    }

    /**
     * @param  array<mixed>  $values
     */
    public function create(int $registerId, string $schoolId, int $recordCollectionId, array $values): Response
    {
        return $this->connector->send(new CreateRecordCollectionRecordRequest($registerId, $schoolId, $recordCollectionId, $values));
    }

    public function delete(int $registerId, string $schoolId, int $recordCollectionId, int $recordId): Response
    {
        return $this->connector->send(new DeleteRecordCollectionRecordRequest($registerId, $schoolId, $recordCollectionId, $recordId));
    }

    public function forStudent(int $registerId, string $schoolId, int $recordCollectionId): Response
    {
        return $this->connector->send(new GetStudentRecordCollectionRecordsRequest($registerId, $schoolId, $recordCollectionId));
    }

    /**
     * @param  array<mixed>  $values
     */
    public function patch(
        int $registerId,
        string $schoolId,
        int $recordCollectionId,
        int $recordId,
        array $values,
    ): Response {
        return $this->connector->send(new PatchRecordCollectionRecordRequest($registerId, $schoolId, $recordCollectionId, $recordId, $values));
    }
}
