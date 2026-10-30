<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Timetable\SetTimetables;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Timetable\SetTimetable;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a set's timetable.
 *
 * GET /api/timetables/sets/{setId}
 */
class GetSetTimetableRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = SetTimetable::class;

    public function __construct(
        protected int $setId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/timetables/sets/'.rawurlencode((string) $this->setId);
    }
}
