<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources;

use spkm\IsamsApi\Resources\HumanResources\AbsenceTypesResource;
use spkm\IsamsApi\Resources\HumanResources\AdditionalPaymentTypesResource;
use spkm\IsamsApi\Resources\HumanResources\ContractEmployeeLevelsResource;
use spkm\IsamsApi\Resources\HumanResources\DfEAbsenceCategoriesResource;
use spkm\IsamsApi\Resources\HumanResources\DfEContractTypesResource;
use spkm\IsamsApi\Resources\HumanResources\DfERoleIdentifiersResource;
use spkm\IsamsApi\Resources\HumanResources\DisclosureAndProbationResource;
use spkm\IsamsApi\Resources\HumanResources\EmployeeAbsencesResource;
use spkm\IsamsApi\Resources\HumanResources\EmployeeChildrensBarredListChecksResource;
use spkm\IsamsApi\Resources\HumanResources\EmployeeContactsResource;
use spkm\IsamsApi\Resources\HumanResources\EmployeeContractsResource;
use spkm\IsamsApi\Resources\HumanResources\EmployeeCustomFieldsResource;
use spkm\IsamsApi\Resources\HumanResources\EmployeeDepartmentsResource;
use spkm\IsamsApi\Resources\HumanResources\EmployeeDisclosureBarringServiceChecksResource;
use spkm\IsamsApi\Resources\HumanResources\EmployeeFinancialInformationResource;
use spkm\IsamsApi\Resources\HumanResources\EmployeeHousesResource;
use spkm\IsamsApi\Resources\HumanResources\EmployeeIdentityChecksResource;
use spkm\IsamsApi\Resources\HumanResources\EmployeePhotosResource;
use spkm\IsamsApi\Resources\HumanResources\EmployeeProbationsResource;
use spkm\IsamsApi\Resources\HumanResources\EmployeeQualificationChecksResource;
use spkm\IsamsApi\Resources\HumanResources\EmployeeQualificationsResource;
use spkm\IsamsApi\Resources\HumanResources\EmployeeReferenceChecksResource;
use spkm\IsamsApi\Resources\HumanResources\EmployeeRightToWorkChecksResource;
use spkm\IsamsApi\Resources\HumanResources\EmployeeRolesResource;
use spkm\IsamsApi\Resources\HumanResources\EmployeeTeachingProhibitionChecksResource;
use spkm\IsamsApi\Resources\HumanResources\EmployeesResource;
use spkm\IsamsApi\Resources\HumanResources\EmploymentTypesResource;
use spkm\IsamsApi\Resources\HumanResources\LeavingReasonsResource;
use spkm\IsamsApi\Resources\HumanResources\QualificationLevelsResource;
use spkm\IsamsApi\Resources\HumanResources\QualificationSubjectsResource;
use spkm\IsamsApi\Resources\HumanResources\QualificationTypesResource;
use spkm\IsamsApi\Resources\HumanResources\RoleEmployeesResource;
use spkm\IsamsApi\Resources\HumanResources\RolesResource;
use spkm\IsamsApi\Resources\HumanResources\SalariesResource;
use spkm\IsamsApi\Resources\HumanResources\SalaryAdditionalPaymentsResource;
use spkm\IsamsApi\Resources\HumanResources\SalaryPayScalesResource;
use spkm\IsamsApi\Resources\HumanResources\TeachingSkillsResource;

class HumanResourcesResource extends IsamsResource
{
    public function absenceTypes(): AbsenceTypesResource
    {
        return new AbsenceTypesResource($this->connector);
    }

    public function additionalPaymentTypes(): AdditionalPaymentTypesResource
    {
        return new AdditionalPaymentTypesResource($this->connector);
    }

    public function contractEmployeeLevels(): ContractEmployeeLevelsResource
    {
        return new ContractEmployeeLevelsResource($this->connector);
    }

    public function dfEAbsenceCategories(): DfEAbsenceCategoriesResource
    {
        return new DfEAbsenceCategoriesResource($this->connector);
    }

    public function dfEContractTypes(): DfEContractTypesResource
    {
        return new DfEContractTypesResource($this->connector);
    }

    public function dfERoleIdentifiers(): DfERoleIdentifiersResource
    {
        return new DfERoleIdentifiersResource($this->connector);
    }

    public function disclosureAndProbation(): DisclosureAndProbationResource
    {
        return new DisclosureAndProbationResource($this->connector);
    }

    public function employeeAbsences(): EmployeeAbsencesResource
    {
        return new EmployeeAbsencesResource($this->connector);
    }

    public function employeeChildrensBarredListChecks(): EmployeeChildrensBarredListChecksResource
    {
        return new EmployeeChildrensBarredListChecksResource($this->connector);
    }

    public function employeeContacts(): EmployeeContactsResource
    {
        return new EmployeeContactsResource($this->connector);
    }

    public function employeeContracts(): EmployeeContractsResource
    {
        return new EmployeeContractsResource($this->connector);
    }

    public function employeeCustomFields(): EmployeeCustomFieldsResource
    {
        return new EmployeeCustomFieldsResource($this->connector);
    }

    public function employeeDepartments(): EmployeeDepartmentsResource
    {
        return new EmployeeDepartmentsResource($this->connector);
    }

    public function employeeDisclosureBarringServiceChecks(): EmployeeDisclosureBarringServiceChecksResource
    {
        return new EmployeeDisclosureBarringServiceChecksResource($this->connector);
    }

    public function employeeFinancialInformation(): EmployeeFinancialInformationResource
    {
        return new EmployeeFinancialInformationResource($this->connector);
    }

    public function employeeHouses(): EmployeeHousesResource
    {
        return new EmployeeHousesResource($this->connector);
    }

    public function employeeIdentityChecks(): EmployeeIdentityChecksResource
    {
        return new EmployeeIdentityChecksResource($this->connector);
    }

    public function employeePhotos(): EmployeePhotosResource
    {
        return new EmployeePhotosResource($this->connector);
    }

    public function employeeProbations(): EmployeeProbationsResource
    {
        return new EmployeeProbationsResource($this->connector);
    }

    public function employeeQualificationChecks(): EmployeeQualificationChecksResource
    {
        return new EmployeeQualificationChecksResource($this->connector);
    }

    public function employeeQualifications(): EmployeeQualificationsResource
    {
        return new EmployeeQualificationsResource($this->connector);
    }

    public function employeeReferenceChecks(): EmployeeReferenceChecksResource
    {
        return new EmployeeReferenceChecksResource($this->connector);
    }

    public function employeeRightToWorkChecks(): EmployeeRightToWorkChecksResource
    {
        return new EmployeeRightToWorkChecksResource($this->connector);
    }

    public function employeeRoles(): EmployeeRolesResource
    {
        return new EmployeeRolesResource($this->connector);
    }

    public function employeeTeachingProhibitionChecks(): EmployeeTeachingProhibitionChecksResource
    {
        return new EmployeeTeachingProhibitionChecksResource($this->connector);
    }

    public function employees(): EmployeesResource
    {
        return new EmployeesResource($this->connector);
    }

    public function employmentTypes(): EmploymentTypesResource
    {
        return new EmploymentTypesResource($this->connector);
    }

    public function leavingReasons(): LeavingReasonsResource
    {
        return new LeavingReasonsResource($this->connector);
    }

    public function qualificationLevels(): QualificationLevelsResource
    {
        return new QualificationLevelsResource($this->connector);
    }

    public function qualificationSubjects(): QualificationSubjectsResource
    {
        return new QualificationSubjectsResource($this->connector);
    }

    public function qualificationTypes(): QualificationTypesResource
    {
        return new QualificationTypesResource($this->connector);
    }

    public function roleEmployees(): RoleEmployeesResource
    {
        return new RoleEmployeesResource($this->connector);
    }

    public function roles(): RolesResource
    {
        return new RolesResource($this->connector);
    }

    public function salaries(): SalariesResource
    {
        return new SalariesResource($this->connector);
    }

    public function salaryAdditionalPayments(): SalaryAdditionalPaymentsResource
    {
        return new SalaryAdditionalPaymentsResource($this->connector);
    }

    public function salaryPayScales(): SalaryPayScalesResource
    {
        return new SalaryPayScalesResource($this->connector);
    }

    public function teachingSkills(): TeachingSkillsResource
    {
        return new TeachingSkillsResource($this->connector);
    }
}
