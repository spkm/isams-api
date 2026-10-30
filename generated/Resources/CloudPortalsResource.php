<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources;

use Saloon\Http\BaseResource;
use spkm\IsamsApi\Resources\CloudPortals\AdmissionsResource;
use spkm\IsamsApi\Resources\CloudPortals\BillingResource;
use spkm\IsamsApi\Resources\CloudPortals\BulletinResource;
use spkm\IsamsApi\Resources\CloudPortals\DocumentSigningResource;
use spkm\IsamsApi\Resources\CloudPortals\HomeworkResource;
use spkm\IsamsApi\Resources\CloudPortals\NewsResource;
use spkm\IsamsApi\Resources\CloudPortals\ParentResource;
use spkm\IsamsApi\Resources\CloudPortals\ReportsResource;
use spkm\IsamsApi\Resources\CloudPortals\SchoolResource;
use spkm\IsamsApi\Resources\CloudPortals\StudentsResource;
use spkm\IsamsApi\Resources\CloudPortals\SystemConfigurationResource;

class CloudPortalsResource extends BaseResource
{
    public function admissions(): AdmissionsResource
    {
        return new AdmissionsResource($this->connector);
    }

    public function billing(): BillingResource
    {
        return new BillingResource($this->connector);
    }

    public function bulletin(): BulletinResource
    {
        return new BulletinResource($this->connector);
    }

    public function documentSigning(): DocumentSigningResource
    {
        return new DocumentSigningResource($this->connector);
    }

    public function homework(): HomeworkResource
    {
        return new HomeworkResource($this->connector);
    }

    public function news(): NewsResource
    {
        return new NewsResource($this->connector);
    }

    public function parent(): ParentResource
    {
        return new ParentResource($this->connector);
    }

    public function reports(): ReportsResource
    {
        return new ReportsResource($this->connector);
    }

    public function school(): SchoolResource
    {
        return new SchoolResource($this->connector);
    }

    public function students(): StudentsResource
    {
        return new StudentsResource($this->connector);
    }

    public function systemConfiguration(): SystemConfigurationResource
    {
        return new SystemConfigurationResource($this->connector);
    }
}
