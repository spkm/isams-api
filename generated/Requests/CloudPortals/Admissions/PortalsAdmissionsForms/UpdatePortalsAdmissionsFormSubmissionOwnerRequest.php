<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\Admissions\PortalsAdmissionsForms;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Admissions\SubmissionOwner;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Updates the user associated with a submission.
 *
 * POST /api/portals/admissions/forms/submission/updateOwner
 */
class UpdatePortalsAdmissionsFormSubmissionOwnerRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\SubmissionOwner|array<string, mixed>  $form
     */
    public function __construct(
        protected SubmissionOwner|array $form,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/admissions/forms/submission/updateOwner';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->form instanceof Data ? $this->form->toArray() : $this->form;
    }
}
