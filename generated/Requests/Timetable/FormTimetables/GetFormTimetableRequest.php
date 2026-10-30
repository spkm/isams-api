<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\Timetable\FormTimetables;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\Timetable\FormTimetable;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a form's timetable.
 *
 * GET /api/timetables/forms/{formCode}
 */
class GetFormTimetableRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = FormTimetable::class;

    public function __construct(
        protected string $formCode,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/timetables/forms/'.rawurlencode((string) $this->formCode);
    }
}
