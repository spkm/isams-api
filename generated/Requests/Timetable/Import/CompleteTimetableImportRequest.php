<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Timetable\Import;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a timetable and completes the active import
 *
 * POST /api/timetables/import/active/commands/complete
 */
class CompleteTimetableImportRequest extends IsamsRequest
{
    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    public function resolveEndpoint(): string
    {
        return '/api/timetables/import/active/commands/complete';
    }
}
