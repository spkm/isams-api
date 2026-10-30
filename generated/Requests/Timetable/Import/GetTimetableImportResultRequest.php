<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Timetable\Import;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Timetable\TimetableImportResult;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Gets the results of a completed import
 *
 * GET /api/timetables/import/timetables/{id}/results
 */
class GetTimetableImportResultRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = TimetableImportResult::class;

    public function __construct(
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/timetables/import/timetables/'.rawurlencode((string) $this->id).'/results';
    }
}
