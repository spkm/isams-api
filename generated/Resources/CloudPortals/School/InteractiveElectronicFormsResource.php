<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Data\CloudPortals\ElectronicForm;
use spkm\IsamsApi\Data\CloudPortals\ElectronicFormResponse;
use spkm\IsamsApi\Data\CloudPortals\ElectronicFormResponseForCreate;
use spkm\IsamsApi\Data\Created;
use spkm\IsamsApi\Requests\CloudPortals\School\InteractiveElectronicForms\GetInteractiveElectronicFormAvailableElectronicFormDetailsRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\InteractiveElectronicForms\GetInteractiveElectronicFormPendingElectronicFormsRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\InteractiveElectronicForms\GetInteractiveElectronicFormRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\InteractiveElectronicForms\GetInteractiveElectronicFormResponsesRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\InteractiveElectronicForms\GetInteractiveElectronicFormsHistoryForFormRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\InteractiveElectronicForms\GetInteractiveElectronicFormsHistoryRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\InteractiveElectronicForms\SaveInteractiveElectronicFormResponseRequest;
use spkm\IsamsApi\Resources\IsamsResource;

class InteractiveElectronicFormsResource extends IsamsResource
{
    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\InteractiveElectronicForms\GetInteractiveElectronicFormRequest
     */
    public function get(int $formId): ElectronicForm
    {
        return $this->fetch(new GetInteractiveElectronicFormRequest(formId: $formId));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\CloudPortals\AvailableElectronicFormDetails>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\InteractiveElectronicForms\GetInteractiveElectronicFormAvailableElectronicFormDetailsRequest
     */
    public function getAvailableElectronicFormDetails(): Collection
    {
        return $this->fetch(new GetInteractiveElectronicFormAvailableElectronicFormDetailsRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\CloudPortals\ElectronicFormDetails>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\InteractiveElectronicForms\GetInteractiveElectronicFormsHistoryRequest
     */
    public function getHistory(): Collection
    {
        return $this->fetch(new GetInteractiveElectronicFormsHistoryRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\CloudPortals\ElectronicFormDetails>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\InteractiveElectronicForms\GetInteractiveElectronicFormsHistoryForFormRequest
     */
    public function getHistoryForForm(int $formId): Collection
    {
        return $this->fetch(new GetInteractiveElectronicFormsHistoryForFormRequest(formId: $formId));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\CloudPortals\ElectronicFormDetails>
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\InteractiveElectronicForms\GetInteractiveElectronicFormPendingElectronicFormsRequest
     */
    public function getPending(): Collection
    {
        return $this->fetch(new GetInteractiveElectronicFormPendingElectronicFormsRequest());
    }

    /**
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\InteractiveElectronicForms\GetInteractiveElectronicFormResponsesRequest
     */
    public function getResponses(int $formId, int $formResponseDetailsId): ElectronicFormResponse
    {
        return $this->fetch(new GetInteractiveElectronicFormResponsesRequest(formId: $formId, formResponseDetailsId: $formResponseDetailsId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\CloudPortals\ElectronicFormResponseForCreate|array<string, mixed>  $electronicFormResponse
     * @see \spkm\IsamsApi\Requests\CloudPortals\School\InteractiveElectronicForms\SaveInteractiveElectronicFormResponseRequest
     */
    public function saveResponse(int $formId, ElectronicFormResponseForCreate|array $electronicFormResponse): Created
    {
        return $this->fetch(new SaveInteractiveElectronicFormResponseRequest(formId: $formId, electronicFormResponse: $electronicFormResponse));
    }
}
