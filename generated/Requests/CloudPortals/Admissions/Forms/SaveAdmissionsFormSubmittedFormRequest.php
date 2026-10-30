<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Requests\CloudPortals\Admissions\Forms;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Traits\Body\HasJsonBody;
use spkm\IsamsApi\Data\Admissions\AdmissionsFormOrchardFormForCreate;
use spkm\IsamsApi\Data\Data;
use spkm\IsamsApi\Requests\IsamsRequest;

/**
 * Saves submitted form.
 *
 * POST /api/portals/admissions/forms/submission
 */
class SaveAdmissionsFormSubmittedFormRequest extends IsamsRequest implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;
    protected string $responseShape = self::CREATED;

    /**
     * @param  \spkm\IsamsApi\Data\Admissions\AdmissionsFormOrchardFormForCreate|array<string, mixed>  $admissionsFormOrchardForm
     */
    public function __construct(
        protected AdmissionsFormOrchardFormForCreate|array $admissionsFormOrchardForm,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/api/portals/admissions/forms/submission';
    }

    /**
     * @return array<mixed>
     */
    protected function defaultBody(): array
    {
        return $this->admissionsFormOrchardForm instanceof Data ? $this->admissionsFormOrchardForm->toArray() : $this->admissionsFormOrchardForm;
    }
}
