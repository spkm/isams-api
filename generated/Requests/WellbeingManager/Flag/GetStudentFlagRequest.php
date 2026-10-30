<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\Flag;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\WellbeingManager\PastoralFlag;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a pastoral flag for a student.
 *
 * GET /api/wellbeing/students/{schoolId}/flag
 */
class GetStudentFlagRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = PastoralFlag::class;

    public function __construct(
        protected string $schoolId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/students/'.rawurlencode((string) $this->schoolId).'/flag';
    }
}
