<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\ConcernVisibilities;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\WellbeingManager\ConcernVisibility;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves all user visibilities for a concern.
 *
 * GET /api/wellbeing/students/{schoolId}/concerns/{concernId}/visibilities
 */
class GetConcernVisibilitiesRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::LIST;
    protected ?string $dto = ConcernVisibility::class;
    public string $resultKey = 'visibilities';

    public function __construct(
        protected string $schoolId,
        protected int $concernId,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/students/'.rawurlencode((string) $this->schoolId).'/concerns/'.rawurlencode((string) $this->concernId).'/visibilities';
    }
}
