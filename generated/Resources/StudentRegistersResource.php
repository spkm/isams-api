<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources;

use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;
use spkm\IsamsApi\Data\StudentRegisters\Register;
use spkm\IsamsApi\Requests\StudentRegisters\GetRecordCollectionElementsRequest;
use spkm\IsamsApi\Requests\StudentRegisters\GetStudentRegistersRequest;
use spkm\IsamsApi\Resources\StudentRegisters\AssociationResource;
use spkm\IsamsApi\Resources\StudentRegisters\DateRangesResource;
use spkm\IsamsApi\Resources\StudentRegisters\FieldsResource;
use spkm\IsamsApi\Resources\StudentRegisters\ListsResource;
use spkm\IsamsApi\Resources\StudentRegisters\MetadataResource;
use spkm\IsamsApi\Resources\StudentRegisters\RecordCollectionResource;
use spkm\IsamsApi\Resources\StudentRegisters\ScreeningLogsResource;

class StudentRegistersResource extends IsamsResource
{
    public function association(): AssociationResource
    {
        return new AssociationResource($this->connector);
    }

    public function dateRanges(): DateRangesResource
    {
        return new DateRangesResource($this->connector);
    }

    public function fields(): FieldsResource
    {
        return new FieldsResource($this->connector);
    }

    public function lists(): ListsResource
    {
        return new ListsResource($this->connector);
    }

    public function metadata(): MetadataResource
    {
        return new MetadataResource($this->connector);
    }

    public function recordCollection(): RecordCollectionResource
    {
        return new RecordCollectionResource($this->connector);
    }

    public function screeningLogs(): ScreeningLogsResource
    {
        return new ScreeningLogsResource($this->connector);
    }

    /**
     * @return \Illuminate\Support\LazyCollection<int, \spkm\IsamsApi\Data\StudentRegisters\Register>
     * @see \spkm\IsamsApi\Requests\StudentRegisters\GetStudentRegistersRequest
     */
    public function all(): LazyCollection
    {
        return $this->each(new GetStudentRegistersRequest(), Register::class);
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\StudentRegisters\RecordCollectionElement>
     * @see \spkm\IsamsApi\Requests\StudentRegisters\GetRecordCollectionElementsRequest
     */
    public function getRecordCollectionElements(int $registerId): Collection
    {
        return $this->fetch(new GetRecordCollectionElementsRequest(registerId: $registerId));
    }
}
