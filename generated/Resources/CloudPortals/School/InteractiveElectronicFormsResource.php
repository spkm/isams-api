<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\School;

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

class InteractiveElectronicFormsResource extends BaseResource
{
    public function get(int $formId): Response
    {
        return $this->connector->send(new GetInteractiveElectronicFormRequest($formId));
    }

    public function getAvailableElectronicFormDetails(): Response
    {
        return $this->connector->send(new GetInteractiveElectronicFormAvailableElectronicFormDetailsRequest());
    }

    public function getHistory(): Response
    {
        return $this->connector->send(new GetInteractiveElectronicFormsHistoryRequest());
    }

    public function getHistoryForForm(int $formId): Response
    {
        return $this->connector->send(new GetInteractiveElectronicFormsHistoryForFormRequest($formId));
    }

    public function getPending(): Response
    {
        return $this->connector->send(new GetInteractiveElectronicFormPendingElectronicFormsRequest());
    }

    public function getResponses(int $formId, int $formResponseDetailsId): Response
    {
        return $this->connector->send(new GetInteractiveElectronicFormResponsesRequest($formId, $formResponseDetailsId));
    }

    /**
     * @param  \spkm\IsamsApi\Data\CloudPortals\ElectronicFormResponseForCreate|array<string, mixed>  $electronicFormResponse
     */
    public function saveResponse(int $formId, ElectronicFormResponseForCreate|array $electronicFormResponse): Response
    {
        return $this->connector->send(new SaveInteractiveElectronicFormResponseRequest($formId, $electronicFormResponse));
    }
}
