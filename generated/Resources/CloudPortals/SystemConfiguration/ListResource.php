<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\CloudPortals\SystemConfiguration;

use Illuminate\Support\Collection;
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
use spkm\IsamsApi\Resources\IsamsResource;

class ListResource extends IsamsResource
{
    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItem>
     * @see \spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List\GetListsRequest
     */
    public function getByType(string $listType): Collection
    {
        return $this->fetch(new GetListsRequest(listType: $listType));
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItem>
     * @see \spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List\GetListCountiesRequest
     */
    public function getCounties(): Collection
    {
        return $this->fetch(new GetListCountiesRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItem>
     * @see \spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List\GetListCountriesRequest
     */
    public function getCountries(): Collection
    {
        return $this->fetch(new GetListCountriesRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItem>
     * @see \spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List\GetListEthnicityRequest
     */
    public function getEthnicity(): Collection
    {
        return $this->fetch(new GetListEthnicityRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItem>
     * @see \spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List\GetListLanguagesRequest
     */
    public function getLanguages(): Collection
    {
        return $this->fetch(new GetListLanguagesRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\MedicalCentre\MedicalConditionSeverityType>
     * @see \spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List\GetListMedicalConditionSeverityTypesRequest
     */
    public function getMedicalConditionSeverityTypes(): Collection
    {
        return $this->fetch(new GetListMedicalConditionSeverityTypesRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\MedicalCentre\MedicalConditionType>
     * @see \spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List\GetListMedicalConditionTypesRequest
     */
    public function getMedicalConditionTypes(): Collection
    {
        return $this->fetch(new GetListMedicalConditionTypesRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\MedicalCentre\MedicalConsentType>
     * @see \spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List\GetListMedicalConsentTypesRequest
     */
    public function getMedicalConsentTypes(): Collection
    {
        return $this->fetch(new GetListMedicalConsentTypesRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\MedicalCentre\MedicalDocumentCategory>
     * @see \spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List\GetListMedicalDocumentCategoriesRequest
     */
    public function getMedicalDocumentCategories(): Collection
    {
        return $this->fetch(new GetListMedicalDocumentCategoriesRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\MedicalCentre\MedicalDocumentSource>
     * @see \spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List\GetListMedicalDocumentSourcesRequest
     */
    public function getMedicalDocumentSources(): Collection
    {
        return $this->fetch(new GetListMedicalDocumentSourcesRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\MedicalCentre\MedicalMedicationLocation>
     * @see \spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List\GetListMedicalMedicationLocationsRequest
     */
    public function getMedicalMedicationLocations(): Collection
    {
        return $this->fetch(new GetListMedicalMedicationLocationsRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\MedicalCentre\MedicalMedicationSupplier>
     * @see \spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List\GetListMedicalMedicationSuppliersRequest
     */
    public function getMedicalMedicationSuppliers(): Collection
    {
        return $this->fetch(new GetListMedicalMedicationSuppliersRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\MedicalCentre\MedicalMedicationType>
     * @see \spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List\GetListMedicalMedicationTypesRequest
     */
    public function getMedicalMedicationTypes(): Collection
    {
        return $this->fetch(new GetListMedicalMedicationTypesRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\MedicalCentre\MedicalNoteType>
     * @see \spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List\GetListMedicalNoteTypesRequest
     */
    public function getMedicalNoteTypes(): Collection
    {
        return $this->fetch(new GetListMedicalNoteTypesRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\MedicalCentre\MedicalVaccinationType>
     * @see \spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List\GetListMedicalVaccinationTypesRequest
     */
    public function getMedicalVaccinationTypes(): Collection
    {
        return $this->fetch(new GetListMedicalVaccinationTypesRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItem>
     * @see \spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List\GetListNationalitiesRequest
     */
    public function getNationalities(): Collection
    {
        return $this->fetch(new GetListNationalitiesRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItem>
     * @see \spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List\GetListPassportPlaceIssuedRequest
     */
    public function getPassportPlaceIssued(): Collection
    {
        return $this->fetch(new GetListPassportPlaceIssuedRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItem>
     * @see \spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List\GetListPassportTypeRequest
     */
    public function getPassportType(): Collection
    {
        return $this->fetch(new GetListPassportTypeRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItem>
     * @see \spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List\GetListReligionsRequest
     */
    public function getReligions(): Collection
    {
        return $this->fetch(new GetListReligionsRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\School\School>
     * @see \spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List\GetListSchoolsRequest
     */
    public function getSchools(): Collection
    {
        return $this->fetch(new GetListSchoolsRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItem>
     * @see \spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List\GetListSelectionCategoriesRequest
     */
    public function getSelectionCategories(): Collection
    {
        return $this->fetch(new GetListSelectionCategoriesRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\SystemConfiguration\GlobalListItem>
     * @see \spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List\GetListTitlesRequest
     */
    public function getTitles(): Collection
    {
        return $this->fetch(new GetListTitlesRequest());
    }

    /**
     * @return \Illuminate\Support\Collection<int, \spkm\IsamsApi\Data\SystemConfiguration\University>
     * @see \spkm\IsamsApi\Requests\CloudPortals\SystemConfiguration\List\GetListUniversitiesRequest
     */
    public function getUniversities(): Collection
    {
        return $this->fetch(new GetListUniversitiesRequest());
    }
}
