<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Timetable\Import;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Timetable\TimetableImport;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Returns the active import
 *
 * GET /api/timetables/import/active
 */
class GetActiveTimetableImportRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = TimetableImport::class;

    public function resolveEndpoint(): string
    {
        return '/api/timetables/import/active';
    }
}
