<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\WellbeingManager\ReasonsForDismissal;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Data\WellbeingManager\ReasonForDismissalForCreate;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a Reason For Dismissal.
 *
 * POST /api/wellbeing/reasonsfordismissal
 */
class CreateReasonForDismissalRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\WellbeingManager\ReasonForDismissalForCreate|array<string, mixed>  $reasonForDismissal
     */
    public function __construct(
        protected ReasonForDismissalForCreate|array $reasonForDismissal,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/wellbeing/reasonsfordismissal';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->reasonForDismissal instanceof Data ? $this->reasonForDismissal->toArray() : $this->reasonForDismissal;
    }
}
