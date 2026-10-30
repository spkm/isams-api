<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\ConcernActions;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\WellbeingManager\ConcernActionForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a concern action.
 *
 * POST /api/wellbeing/students/{schoolId}/concerns/{concernId}/actions
 */
class CreateConcernActionRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ConcernActionForCreate|array<string, mixed>  $concernAction
     */
    public function __construct(
        protected string $schoolId,
        protected int $concernId,
        protected ConcernActionForCreate|array $concernAction,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/students/'.rawurlencode((string) $this->schoolId).'/concerns/'.rawurlencode((string) $this->concernId).'/actions';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->concernAction instanceof Data ? $this->concernAction->toArray() : $this->concernAction;
    }
}
