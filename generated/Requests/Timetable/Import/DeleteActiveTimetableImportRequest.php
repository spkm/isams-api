<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Timetable\Import;

use Saloon\Enums\Method;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Deletes the active import
 *
 * DELETE /api/timetables/import/active
 */
class DeleteActiveTimetableImportRequest extends IsamsRequest
{
    protected Method $method = Method::DELETE;
    protected string $responseShape = self::NONE;

    public function resolveEndpoint(): string
    {
        return '/api/timetables/import/active';
    }
}
