<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use spkm\IsamsApi\Data\CloudPortals\OutstandingFormInstance;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Requests\CloudPortals\School\OutstandingForms\ContinueOutstandingFormFillRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\OutstandingForms\SaveOutstandingFormDraftRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\OutstandingForms\StartOutstandingFormFillRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\OutstandingForms\SubmitOutstandingFormRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class OutstandingFormsResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\OutstandingForms\ContinueOutstandingFormFillRequest
     */
    public function continueFill(string $formId, string $instanceId): OutstandingFormInstance
    {
        return $this->fetch(new ContinueOutstandingFormFillRequest(formId: $formId, instanceId: $instanceId));
    }

    /**
     * @param  array<mixed>  $bodyValue
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\OutstandingForms\SaveOutstandingFormDraftRequest
     */
    public function saveDraft(string $formId, string $fillId, array $bodyValue): Created
    {
        return $this->fetch(new SaveOutstandingFormDraftRequest(formId: $formId, fillId: $fillId, bodyValue: $bodyValue));
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\OutstandingForms\StartOutstandingFormFillRequest
     */
    public function startFill(string $formId, ?string $studentId = null): OutstandingFormInstance
    {
        return $this->fetch(new StartOutstandingFormFillRequest(formId: $formId, studentId: $studentId));
    }

    /**
     * @param  array<mixed>  $bodyValue
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\OutstandingForms\SubmitOutstandingFormRequest
     */
    public function submit(string $formId, string $fillId, array $bodyValue): Created
    {
        return $this->fetch(new SubmitOutstandingFormRequest(formId: $formId, fillId: $fillId, bodyValue: $bodyValue));
    }
}
