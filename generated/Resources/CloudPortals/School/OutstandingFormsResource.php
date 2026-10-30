<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\School\OutstandingForms\ContinueOutstandingFormFillRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\OutstandingForms\SaveOutstandingFormDraftRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\OutstandingForms\StartOutstandingFormFillRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\OutstandingForms\SubmitOutstandingFormRequest;

class OutstandingFormsResource extends BaseResource
{
    public function continueFill(string $formId, string $instanceId): Response
    {
        return $this->connector->send(new ContinueOutstandingFormFillRequest($formId, $instanceId));
    }

    /**
     * @param  array<mixed>  $bodyValue
     */
    public function saveDraft(string $formId, string $fillId, array $bodyValue): Response
    {
        return $this->connector->send(new SaveOutstandingFormDraftRequest($formId, $fillId, $bodyValue));
    }

    public function startFill(string $formId, ?string $studentId = null): Response
    {
        return $this->connector->send(new StartOutstandingFormFillRequest($formId, $studentId));
    }

    /**
     * @param  array<mixed>  $bodyValue
     */
    public function submit(string $formId, string $fillId, array $bodyValue): Response
    {
        return $this->connector->send(new SubmitOutstandingFormRequest($formId, $fillId, $bodyValue));
    }
}
