<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\ConcernGirfec;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\WellbeingManager\ConcernGirfecForm;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves the GIRFEC form data.
 *
 * GET /api/wellbeing/students/{schoolId}/concerns/{concernId}/girfec
 */
class GetConcernGirfecFormRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = ConcernGirfecForm::class;

    public function __construct(
        protected string $schoolId,
        protected int $concernId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/students/'.rawurlencode((string) $this->schoolId).'/concerns/'.rawurlencode((string) $this->concernId).'/girfec';
    }
}
