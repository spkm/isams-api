<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources\SystemConfiguration;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Requests\SystemConfiguration\List\GetListByTypeRequest;
use spkm\IsamsApi\Resources\SystemConfiguration\List\AdmissionsStatusResource;
use spkm\IsamsApi\Resources\SystemConfiguration\List\ContactTypesResource;
use spkm\IsamsApi\Resources\SystemConfiguration\List\CountiesResource;
use spkm\IsamsApi\Resources\SystemConfiguration\List\CountriesResource;
use spkm\IsamsApi\Resources\SystemConfiguration\List\EthnicityResource;
use spkm\IsamsApi\Resources\SystemConfiguration\List\LanguagesResource;
use spkm\IsamsApi\Resources\SystemConfiguration\List\NationalitiesResource;
use spkm\IsamsApi\Resources\SystemConfiguration\List\OfferTypesResource;
use spkm\IsamsApi\Resources\SystemConfiguration\List\PassportPlaceIssuedResource;
use spkm\IsamsApi\Resources\SystemConfiguration\List\PassportTypeResource;
use spkm\IsamsApi\Resources\SystemConfiguration\List\ReligionsResource;
use spkm\IsamsApi\Resources\SystemConfiguration\List\SelectionCategoryResource;
use spkm\IsamsApi\Resources\SystemConfiguration\List\StudentEntryTypeResource;
use spkm\IsamsApi\Resources\SystemConfiguration\List\StudentLeavingReasonsResource;
use spkm\IsamsApi\Resources\SystemConfiguration\List\TitlesResource;
use spkm\IsamsApi\Resources\SystemConfiguration\List\UniversitiesResource;
use spkm\IsamsApi\Resources\SystemConfiguration\List\VisaTypesResource;

class ListResource extends BaseResource
{
    public function admissionsStatus(): AdmissionsStatusResource
    {
        return new AdmissionsStatusResource($this->connector);
    }

    public function contactTypes(): ContactTypesResource
    {
        return new ContactTypesResource($this->connector);
    }

    public function counties(): CountiesResource
    {
        return new CountiesResource($this->connector);
    }

    public function countries(): CountriesResource
    {
        return new CountriesResource($this->connector);
    }

    public function ethnicity(): EthnicityResource
    {
        return new EthnicityResource($this->connector);
    }

    public function languages(): LanguagesResource
    {
        return new LanguagesResource($this->connector);
    }

    public function nationalities(): NationalitiesResource
    {
        return new NationalitiesResource($this->connector);
    }

    public function offerTypes(): OfferTypesResource
    {
        return new OfferTypesResource($this->connector);
    }

    public function passportPlaceIssued(): PassportPlaceIssuedResource
    {
        return new PassportPlaceIssuedResource($this->connector);
    }

    public function passportType(): PassportTypeResource
    {
        return new PassportTypeResource($this->connector);
    }

    public function religions(): ReligionsResource
    {
        return new ReligionsResource($this->connector);
    }

    public function selectionCategory(): SelectionCategoryResource
    {
        return new SelectionCategoryResource($this->connector);
    }

    public function studentEntryType(): StudentEntryTypeResource
    {
        return new StudentEntryTypeResource($this->connector);
    }

    public function studentLeavingReasons(): StudentLeavingReasonsResource
    {
        return new StudentLeavingReasonsResource($this->connector);
    }

    public function titles(): TitlesResource
    {
        return new TitlesResource($this->connector);
    }

    public function universities(): UniversitiesResource
    {
        return new UniversitiesResource($this->connector);
    }

    public function visaTypes(): VisaTypesResource
    {
        return new VisaTypesResource($this->connector);
    }

    public function getByType(string $listType): Response
    {
        return $this->connector->send(new GetListByTypeRequest($listType));
    }
}
