<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\SystemConfiguration;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List\GetListCountiesRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List\GetListCountriesRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List\GetListEthnicityRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List\GetListLanguagesRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List\GetListMedicalConditionSeverityTypesRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List\GetListMedicalConditionTypesRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List\GetListMedicalConsentTypesRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List\GetListMedicalDocumentCategoriesRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List\GetListMedicalDocumentSourcesRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List\GetListMedicalMedicationLocationsRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List\GetListMedicalMedicationSuppliersRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List\GetListMedicalMedicationTypesRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List\GetListMedicalNoteTypesRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List\GetListMedicalVaccinationTypesRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List\GetListNationalitiesRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List\GetListPassportPlaceIssuedRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List\GetListPassportTypeRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List\GetListReligionsRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List\GetListSchoolsRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List\GetListSelectionCategoriesRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List\GetListTitlesRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List\GetListUniversitiesRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List\GetListsRequest;

class ListResource extends BaseResource
{
    public function getByType(string $listType): Response
    {
        return $this->connector->send(new GetListsRequest($listType));
    }

    public function getCounties(): Response
    {
        return $this->connector->send(new GetListCountiesRequest());
    }

    public function getCountries(): Response
    {
        return $this->connector->send(new GetListCountriesRequest());
    }

    public function getEthnicity(): Response
    {
        return $this->connector->send(new GetListEthnicityRequest());
    }

    public function getLanguages(): Response
    {
        return $this->connector->send(new GetListLanguagesRequest());
    }

    public function getMedicalConditionSeverityTypes(): Response
    {
        return $this->connector->send(new GetListMedicalConditionSeverityTypesRequest());
    }

    public function getMedicalConditionTypes(): Response
    {
        return $this->connector->send(new GetListMedicalConditionTypesRequest());
    }

    public function getMedicalConsentTypes(): Response
    {
        return $this->connector->send(new GetListMedicalConsentTypesRequest());
    }

    public function getMedicalDocumentCategories(): Response
    {
        return $this->connector->send(new GetListMedicalDocumentCategoriesRequest());
    }

    public function getMedicalDocumentSources(): Response
    {
        return $this->connector->send(new GetListMedicalDocumentSourcesRequest());
    }

    public function getMedicalMedicationLocations(): Response
    {
        return $this->connector->send(new GetListMedicalMedicationLocationsRequest());
    }

    public function getMedicalMedicationSuppliers(): Response
    {
        return $this->connector->send(new GetListMedicalMedicationSuppliersRequest());
    }

    public function getMedicalMedicationTypes(): Response
    {
        return $this->connector->send(new GetListMedicalMedicationTypesRequest());
    }

    public function getMedicalNoteTypes(): Response
    {
        return $this->connector->send(new GetListMedicalNoteTypesRequest());
    }

    public function getMedicalVaccinationTypes(): Response
    {
        return $this->connector->send(new GetListMedicalVaccinationTypesRequest());
    }

    public function getNationalities(): Response
    {
        return $this->connector->send(new GetListNationalitiesRequest());
    }

    public function getPassportPlaceIssued(): Response
    {
        return $this->connector->send(new GetListPassportPlaceIssuedRequest());
    }

    public function getPassportType(): Response
    {
        return $this->connector->send(new GetListPassportTypeRequest());
    }

    public function getReligions(): Response
    {
        return $this->connector->send(new GetListReligionsRequest());
    }

    public function getSchools(): Response
    {
        return $this->connector->send(new GetListSchoolsRequest());
    }

    public function getSelectionCategories(): Response
    {
        return $this->connector->send(new GetListSelectionCategoriesRequest());
    }

    public function getTitles(): Response
    {
        return $this->connector->send(new GetListTitlesRequest());
    }

    public function getUniversities(): Response
    {
        return $this->connector->send(new GetListUniversitiesRequest());
    }
}
