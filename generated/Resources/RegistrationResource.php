<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Resources\Registration\AbsenceCodesResource;
use spkm\IsamsApi\Resources\Registration\NatureOfAbsenceResource;
use spkm\IsamsApi\Resources\Registration\OffGamesResource;
use spkm\IsamsApi\Resources\Registration\PeriodsResource;
use spkm\IsamsApi\Resources\Registration\PresentCodesResource;
use spkm\IsamsApi\Resources\Registration\ReasonForChangeResource;
use spkm\IsamsApi\Resources\Registration\RulesResource;
use spkm\IsamsApi\Resources\Registration\StatusResource;
use spkm\IsamsApi\Resources\Registration\StatusStudentsResource;

class RegistrationResource extends BaseResource
{
    public function absenceCodes(): AbsenceCodesResource
    {
        return new AbsenceCodesResource($this->connector);
    }

    public function natureOfAbsence(): NatureOfAbsenceResource
    {
        return new NatureOfAbsenceResource($this->connector);
    }

    public function offGames(): OffGamesResource
    {
        return new OffGamesResource($this->connector);
    }

    public function periods(): PeriodsResource
    {
        return new PeriodsResource($this->connector);
    }

    public function presentCodes(): PresentCodesResource
    {
        return new PresentCodesResource($this->connector);
    }

    public function reasonForChange(): ReasonForChangeResource
    {
        return new ReasonForChangeResource($this->connector);
    }

    public function rules(): RulesResource
    {
        return new RulesResource($this->connector);
    }

    public function status(): StatusResource
    {
        return new StatusResource($this->connector);
    }

    public function statusStudents(): StatusStudentsResource
    {
        return new StatusStudentsResource($this->connector);
    }
}
