<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Timetable\Import;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\Timetable\TimetableImportRequestForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates and processes a timetable import
 *
 * POST /api/timetables/import
 */
class CreateTimetableImportRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\Timetable\TimetableImportRequestForCreate|array<string, mixed>  $timetableImportRequest
     */
    public function __construct(
        protected TimetableImportRequestForCreate|array $timetableImportRequest,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/timetables/import';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->timetableImportRequest instanceof Data ? $this->timetableImportRequest->toArray() : $this->timetableImportRequest;
    }
}
