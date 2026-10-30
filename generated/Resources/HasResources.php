<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources;

trait HasResources
{
    public function admissions(): AdmissionsResource
    {
        return new AdmissionsResource($this);
    }

    public function agent(): AgentResource
    {
        return new AgentResource($this);
    }

    public function billing(): BillingResource
    {
        return new BillingResource($this);
    }

    public function bulletin(): BulletinResource
    {
        return new BulletinResource($this);
    }

    public function curriculum(): CurriculumResource
    {
        return new CurriculumResource($this);
    }

    public function discipline(): DisciplineResource
    {
        return new DisciplineResource($this);
    }

    public function estates(): EstatesResource
    {
        return new EstatesResource($this);
    }

    public function exclusions(): ExclusionsResource
    {
        return new ExclusionsResource($this);
    }

    public function gradebooks(): GradebooksResource
    {
        return new GradebooksResource($this);
    }

    public function humanResources(): HumanResourcesResource
    {
        return new HumanResourcesResource($this);
    }

    public function medicalCentre(): MedicalCentreResource
    {
        return new MedicalCentreResource($this);
    }

    public function news(): NewsResource
    {
        return new NewsResource($this);
    }

    public function otherSchools(): OtherSchoolsResource
    {
        return new OtherSchoolsResource($this);
    }

    public function registration(): RegistrationResource
    {
        return new RegistrationResource($this);
    }

    public function rewardsAndConduct(): RewardsAndConductResource
    {
        return new RewardsAndConductResource($this);
    }

    public function school(): SchoolResource
    {
        return new SchoolResource($this);
    }

    public function storage(): StorageResource
    {
        return new StorageResource($this);
    }

    public function studentRegisters(): StudentRegistersResource
    {
        return new StudentRegistersResource($this);
    }

    public function students(): StudentsResource
    {
        return new StudentsResource($this);
    }

    public function systemConfiguration(): SystemConfigurationResource
    {
        return new SystemConfigurationResource($this);
    }

    public function teaching(): TeachingResource
    {
        return new TeachingResource($this);
    }

    public function timetable(): TimetableResource
    {
        return new TimetableResource($this);
    }

    public function wellbeingManager(): WellbeingManagerResource
    {
        return new WellbeingManagerResource($this);
    }
}
