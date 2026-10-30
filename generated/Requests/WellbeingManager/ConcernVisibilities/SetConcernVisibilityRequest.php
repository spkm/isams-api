<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\ConcernVisibilities;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\WellbeingManager\ConcernVisibilityForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Sets the user's visibility for a concern.
 *
 * POST /api/wellbeing/students/{schoolId}/concerns/{concernId}/visibilities
 */
class SetConcernVisibilityRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ConcernVisibilityForCreate|array<string, mixed>  $concernVisibility
     */
    public function __construct(
        protected string $schoolId,
        protected int $concernId,
        protected ConcernVisibilityForCreate|array $concernVisibility,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/students/'.rawurlencode((string) $this->schoolId).'/concerns/'.rawurlencode((string) $this->concernId).'/visibilities';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->concernVisibility instanceof Data ? $this->concernVisibility->toArray() : $this->concernVisibility;
    }
}
