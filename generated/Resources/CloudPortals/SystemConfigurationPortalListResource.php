<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\PortalList\GetPortalListCountiesRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\PortalList\GetPortalListCountriesRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\PortalList\GetPortalListEthnicityRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\PortalList\GetPortalListLanguagesRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\PortalList\GetPortalListMedicalConditionSeverityTypesRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\PortalList\GetPortalListMedicalConditionTypesRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\PortalList\GetPortalListMedicalConsentTypesRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\PortalList\GetPortalListMedicalDocumentCategoriesRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\PortalList\GetPortalListMedicalDocumentSourcesRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\PortalList\GetPortalListMedicalMedicationLocationsRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\PortalList\GetPortalListMedicalMedicationSuppliersRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\PortalList\GetPortalListMedicalMedicationTypesRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\PortalList\GetPortalListMedicalNoteTypesRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\PortalList\GetPortalListMedicalVaccinationTypesRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\PortalList\GetPortalListNationalitiesRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\PortalList\GetPortalListPassportPlaceIssuedRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\PortalList\GetPortalListPassportTypeRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\PortalList\GetPortalListReligionsRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\PortalList\GetPortalListSchoolsRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\PortalList\GetPortalListSelectionCategoriesRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\PortalList\GetPortalListTitlesRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\PortalList\GetPortalListUniversitiesRequest;
use spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\PortalList\GetPortalListsRequest;

class SystemConfigurationPortalListResource extends BaseResource
{
    public function getPortalListCounties(): Response
    {
        return $this->connector->send(new GetPortalListCountiesRequest());
    }

    public function getPortalListCountries(): Response
    {
        return $this->connector->send(new GetPortalListCountriesRequest());
    }

    public function getPortalListEthnicity(): Response
    {
        return $this->connector->send(new GetPortalListEthnicityRequest());
    }

    public function getPortalListLanguages(): Response
    {
        return $this->connector->send(new GetPortalListLanguagesRequest());
    }

    public function getPortalListMedicalConditionSeverityTypes(): Response
    {
        return $this->connector->send(new GetPortalListMedicalConditionSeverityTypesRequest());
    }

    public function getPortalListMedicalConditionTypes(): Response
    {
        return $this->connector->send(new GetPortalListMedicalConditionTypesRequest());
    }

    public function getPortalListMedicalConsentTypes(): Response
    {
        return $this->connector->send(new GetPortalListMedicalConsentTypesRequest());
    }

    public function getPortalListMedicalDocumentCategories(): Response
    {
        return $this->connector->send(new GetPortalListMedicalDocumentCategoriesRequest());
    }

    public function getPortalListMedicalDocumentSources(): Response
    {
        return $this->connector->send(new GetPortalListMedicalDocumentSourcesRequest());
    }

    public function getPortalListMedicalMedicationLocations(): Response
    {
        return $this->connector->send(new GetPortalListMedicalMedicationLocationsRequest());
    }

    public function getPortalListMedicalMedicationSuppliers(): Response
    {
        return $this->connector->send(new GetPortalListMedicalMedicationSuppliersRequest());
    }

    public function getPortalListMedicalMedicationTypes(): Response
    {
        return $this->connector->send(new GetPortalListMedicalMedicationTypesRequest());
    }

    public function getPortalListMedicalNoteTypes(): Response
    {
        return $this->connector->send(new GetPortalListMedicalNoteTypesRequest());
    }

    public function getPortalListMedicalVaccinationTypes(): Response
    {
        return $this->connector->send(new GetPortalListMedicalVaccinationTypesRequest());
    }

    public function getPortalListNationalities(): Response
    {
        return $this->connector->send(new GetPortalListNationalitiesRequest());
    }

    public function getPortalListPassportPlaceIssued(): Response
    {
        return $this->connector->send(new GetPortalListPassportPlaceIssuedRequest());
    }

    public function getPortalListPassportType(): Response
    {
        return $this->connector->send(new GetPortalListPassportTypeRequest());
    }

    public function getPortalListReligions(): Response
    {
        return $this->connector->send(new GetPortalListReligionsRequest());
    }

    public function getPortalListSchools(): Response
    {
        return $this->connector->send(new GetPortalListSchoolsRequest());
    }

    public function getPortalListSelectionCategories(): Response
    {
        return $this->connector->send(new GetPortalListSelectionCategoriesRequest());
    }

    public function getPortalListTitles(): Response
    {
        return $this->connector->send(new GetPortalListTitlesRequest());
    }

    public function getPortalListUniversities(): Response
    {
        return $this->connector->send(new GetPortalListUniversitiesRequest());
    }

    public function getPortalLists(string $listType): Response
    {
        return $this->connector->send(new GetPortalListsRequest($listType));
    }
}
