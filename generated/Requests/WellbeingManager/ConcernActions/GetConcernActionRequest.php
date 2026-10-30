<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\ConcernActions;

use Saloon\Enums\Method;
use spkm\IsamsApi\Data\WellbeingManager\ConcernAction;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Retrieves a concern action.
 *
 * GET /api/wellbeing/students/{schoolId}/concerns/{concernId}/actions/{id}
 */
class GetConcernActionRequest extends IsamsRequest
{
    protected Method $method = Method::GET;
    protected string $responseShape = self::ONE;
    protected ?string $dto = ConcernAction::class;

    public function __construct(
        protected string $schoolId,
        protected int $concernId,
        protected int $id,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/students/'.rawurlencode((string) $this->schoolId).'/concerns/'.rawurlencode((string) $this->concernId).'/actions/'.rawurlencode((string) $this->id);
    }
}
