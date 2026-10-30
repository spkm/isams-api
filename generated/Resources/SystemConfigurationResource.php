<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Resources\SystemConfiguration\ListAdmissionsStatusResource;
use spkm\IsamsApi\Resources\SystemConfiguration\ListContactTypesResource;
use spkm\IsamsApi\Resources\SystemConfiguration\ListCountiesResource;
use spkm\IsamsApi\Resources\SystemConfiguration\ListCountriesResource;
use spkm\IsamsApi\Resources\SystemConfiguration\ListEthnicityResource;
use spkm\IsamsApi\Resources\SystemConfiguration\ListGroupResource;
use spkm\IsamsApi\Resources\SystemConfiguration\ListLanguagesResource;
use spkm\IsamsApi\Resources\SystemConfiguration\ListNationalitiesResource;
use spkm\IsamsApi\Resources\SystemConfiguration\ListOfferTypesResource;
use spkm\IsamsApi\Resources\SystemConfiguration\ListPassportPlaceIssuedResource;
use spkm\IsamsApi\Resources\SystemConfiguration\ListPassportTypeResource;
use spkm\IsamsApi\Resources\SystemConfiguration\ListReligionsResource;
use spkm\IsamsApi\Resources\SystemConfiguration\ListResource;
use spkm\IsamsApi\Resources\SystemConfiguration\ListSelectionCategoryResource;
use spkm\IsamsApi\Resources\SystemConfiguration\ListStudentEntryTypeResource;
use spkm\IsamsApi\Resources\SystemConfiguration\ListStudentLeavingReasonsResource;
use spkm\IsamsApi\Resources\SystemConfiguration\ListTitlesResource;
use spkm\IsamsApi\Resources\SystemConfiguration\ListUniversitiesResource;
use spkm\IsamsApi\Resources\SystemConfiguration\ListVisaTypesResource;
use spkm\IsamsApi\Resources\SystemConfiguration\SmsResource;
use spkm\IsamsApi\Resources\SystemConfiguration\TagsCategoriesResource;
use spkm\IsamsApi\Resources\SystemConfiguration\TagsEntityTypesResource;

class SystemConfigurationResource extends BaseResource
{
    public function listAdmissionsStatus(): ListAdmissionsStatusResource
    {
        return new ListAdmissionsStatusResource($this->connector);
    }

    public function listContactTypes(): ListContactTypesResource
    {
        return new ListContactTypesResource($this->connector);
    }

    public function listCounties(): ListCountiesResource
    {
        return new ListCountiesResource($this->connector);
    }

    public function listCountries(): ListCountriesResource
    {
        return new ListCountriesResource($this->connector);
    }

    public function listEthnicity(): ListEthnicityResource
    {
        return new ListEthnicityResource($this->connector);
    }

    public function listGroup(): ListGroupResource
    {
        return new ListGroupResource($this->connector);
    }

    public function listLanguages(): ListLanguagesResource
    {
        return new ListLanguagesResource($this->connector);
    }

    public function listNationalities(): ListNationalitiesResource
    {
        return new ListNationalitiesResource($this->connector);
    }

    public function listOfferTypes(): ListOfferTypesResource
    {
        return new ListOfferTypesResource($this->connector);
    }

    public function listPassportPlaceIssued(): ListPassportPlaceIssuedResource
    {
        return new ListPassportPlaceIssuedResource($this->connector);
    }

    public function listPassportType(): ListPassportTypeResource
    {
        return new ListPassportTypeResource($this->connector);
    }

    public function listReligions(): ListReligionsResource
    {
        return new ListReligionsResource($this->connector);
    }

    public function list(): ListResource
    {
        return new ListResource($this->connector);
    }

    public function listSelectionCategory(): ListSelectionCategoryResource
    {
        return new ListSelectionCategoryResource($this->connector);
    }

    public function listStudentEntryType(): ListStudentEntryTypeResource
    {
        return new ListStudentEntryTypeResource($this->connector);
    }

    public function listStudentLeavingReasons(): ListStudentLeavingReasonsResource
    {
        return new ListStudentLeavingReasonsResource($this->connector);
    }

    public function listTitles(): ListTitlesResource
    {
        return new ListTitlesResource($this->connector);
    }

    public function listUniversities(): ListUniversitiesResource
    {
        return new ListUniversitiesResource($this->connector);
    }

    public function listVisaTypes(): ListVisaTypesResource
    {
        return new ListVisaTypesResource($this->connector);
    }

    public function sms(): SmsResource
    {
        return new SmsResource($this->connector);
    }

    public function tagsCategories(): TagsCategoriesResource
    {
        return new TagsCategoriesResource($this->connector);
    }

    public function tagsEntityTypes(): TagsEntityTypesResource
    {
        return new TagsEntityTypesResource($this->connector);
    }
}
