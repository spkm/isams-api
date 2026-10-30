<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Data\CloudPortals\ElectronicFormResponseForCreate;
use spkm\IsamsApi\Requests\CloudPortals\School\InteractiveElectronicForms\GetInteractiveElectronicFormAvailableElectronicFormDetailsRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\InteractiveElectronicForms\GetInteractiveElectronicFormPendingElectronicFormsRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\InteractiveElectronicForms\GetInteractiveElectronicFormRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\InteractiveElectronicForms\GetInteractiveElectronicFormResponsesRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\InteractiveElectronicForms\GetInteractiveElectronicFormsHistoryForFormRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\InteractiveElectronicForms\GetInteractiveElectronicFormsHistoryRequest;
use spkm\IsamsApi\Requests\CloudPortals\School\InteractiveElectronicForms\SaveInteractiveElectronicFormResponseRequest;

class SchoolInteractiveElectronicFormsResource extends BaseResource
{
    public function getInteractiveElectronicForm(int $formId): Response
    {
        return $this->connector->send(new GetInteractiveElectronicFormRequest($formId));
    }

    public function getInteractiveElectronicFormAvailableElectronicFormDetails(): Response
    {
        return $this->connector->send(new GetInteractiveElectronicFormAvailableElectronicFormDetailsRequest());
    }

    public function getInteractiveElectronicFormPendingElectronicForms(): Response
    {
        return $this->connector->send(new GetInteractiveElectronicFormPendingElectronicFormsRequest());
    }

    public function getInteractiveElectronicFormResponses(int $formId, int $formResponseDetailsId): Response
    {
        return $this->connector->send(new GetInteractiveElectronicFormResponsesRequest($formId, $formResponseDetailsId));
    }

    public function getInteractiveElectronicFormsHistory(): Response
    {
        return $this->connector->send(new GetInteractiveElectronicFormsHistoryRequest());
    }

    public function getInteractiveElectronicFormsHistoryForForm(int $formId): Response
    {
        return $this->connector->send(new GetInteractiveElectronicFormsHistoryForFormRequest($formId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\CloudPortals\ElectronicFormResponseForCreate|array<string, mixed>  $formResponse
     */
    public function saveInteractiveElectronicFormResponse(
        int $formId,
        ElectronicFormResponseForCreate|array $formResponse,
    ): Response {
        return $this->connector->send(new SaveInteractiveElectronicFormResponseRequest($formId, $formResponse));
    }
}
