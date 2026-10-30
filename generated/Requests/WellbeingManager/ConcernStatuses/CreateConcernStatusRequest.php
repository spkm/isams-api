<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\ConcernStatuses;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\WellbeingManager\ConcernStatusForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a Concern Status.
 *
 * POST /api/wellbeing/concernstatuses
 */
class CreateConcernStatusRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ConcernStatusForCreate|array<string, mixed>  $concernStatus
     */
    public function __construct(
        protected ConcernStatusForCreate|array $concernStatus,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/concernstatuses';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->concernStatus instanceof Data ? $this->concernStatus->toArray() : $this->concernStatus;
    }
}
