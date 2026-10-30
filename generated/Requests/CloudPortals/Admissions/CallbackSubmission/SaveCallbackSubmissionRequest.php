<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\Admissions\CallbackSubmission;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Admissions\CallbackSubmissionForCreate;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Creates a new Callback submission.
 *
 * POST /api/portals/admissions/callbackSubmission/submit
 */
class SaveCallbackSubmissionRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\CallbackSubmissionForCreate|array<string, mixed>  $submission
     */
    public function __construct(
        protected CallbackSubmissionForCreate|array $submission,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/admissions/callbackSubmission/submit';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->submission instanceof Data ? $this->submission->toArray() : $this->submission;
    }
}
