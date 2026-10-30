<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\StudentRegisters\GetRecordCollectionElementsRequest;
use spkm\IsamsApi\Requests\StudentRegisters\GetStudentRegistersRequest;
use spkm\IsamsApi\Resources\StudentRegisters\DateRangesResource;
use spkm\IsamsApi\Resources\StudentRegisters\FieldsResource;
use spkm\IsamsApi\Resources\StudentRegisters\ListsResource;
use spkm\IsamsApi\Resources\StudentRegisters\MetadataResource;
use spkm\IsamsApi\Resources\StudentRegisters\RecordCollectionResource;
use spkm\IsamsApi\Resources\StudentRegisters\RegisterAssociationResource;
use spkm\IsamsApi\Resources\StudentRegisters\ScreeningLogsResource;

class StudentRegistersResource extends BaseResource
{
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

    public function registerAssociation(): RegisterAssociationResource
    {
        return new RegisterAssociationResource($this->connector);
    }

    public function screeningLogs(): ScreeningLogsResource
    {
        return new ScreeningLogsResource($this->connector);
    }

    public function getRecordCollectionElements(int $registerId): Response
    {
        return $this->connector->send(new GetRecordCollectionElementsRequest($registerId));
    }

    public function getStudentRegisters(?int $page = null, ?int $pageSize = null): Response
    {
        return $this->connector->send(new GetStudentRegistersRequest($page, $pageSize));
    }
}
