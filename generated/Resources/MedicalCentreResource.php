<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources;

use spkm\IsamsApi\Resources\MedicalCentre\ConditionResource;
use spkm\IsamsApi\Resources\MedicalCentre\ConsentResource;
use spkm\IsamsApi\Resources\MedicalCentre\DoctorsResource;
use spkm\IsamsApi\Resources\MedicalCentre\DocumentResource;
use spkm\IsamsApi\Resources\MedicalCentre\InventoryResource;
use spkm\IsamsApi\Resources\MedicalCentre\MedicationResource;
use spkm\IsamsApi\Resources\MedicalCentre\NoteResource;
use spkm\IsamsApi\Resources\MedicalCentre\StockResource;
use spkm\IsamsApi\Resources\MedicalCentre\StudentBmiResource;
use spkm\IsamsApi\Resources\MedicalCentre\StudentConditionsResource;
use spkm\IsamsApi\Resources\MedicalCentre\StudentConsentsResource;
use spkm\IsamsApi\Resources\MedicalCentre\StudentDoctorResource;
use spkm\IsamsApi\Resources\MedicalCentre\StudentDocumentsResource;
use spkm\IsamsApi\Resources\MedicalCentre\StudentInventoryResource;
use spkm\IsamsApi\Resources\MedicalCentre\StudentMedicationResource;
use spkm\IsamsApi\Resources\MedicalCentre\StudentNotesResource;
use spkm\IsamsApi\Resources\MedicalCentre\StudentVaccinationsResource;
use spkm\IsamsApi\Resources\MedicalCentre\StudentVisitsResource;
use spkm\IsamsApi\Resources\MedicalCentre\SurgeriesResource;
use spkm\IsamsApi\Resources\MedicalCentre\VaccinationResource;
use spkm\IsamsApi\Resources\MedicalCentre\VisitResource;

class MedicalCentreResource extends IsamsResource
{
    public function condition(): ConditionResource
    {
        return new ConditionResource($this->connector);
    }

    public function consent(): ConsentResource
    {
        return new ConsentResource($this->connector);
    }

    public function doctors(): DoctorsResource
    {
        return new DoctorsResource($this->connector);
    }

    public function document(): DocumentResource
    {
        return new DocumentResource($this->connector);
    }

    public function inventory(): InventoryResource
    {
        return new InventoryResource($this->connector);
    }

    public function medication(): MedicationResource
    {
        return new MedicationResource($this->connector);
    }

    public function note(): NoteResource
    {
        return new NoteResource($this->connector);
    }

    public function stock(): StockResource
    {
        return new StockResource($this->connector);
    }

    public function studentBmi(): StudentBmiResource
    {
        return new StudentBmiResource($this->connector);
    }

    public function studentConditions(): StudentConditionsResource
    {
        return new StudentConditionsResource($this->connector);
    }

    public function studentConsents(): StudentConsentsResource
    {
        return new StudentConsentsResource($this->connector);
    }

    public function studentDoctor(): StudentDoctorResource
    {
        return new StudentDoctorResource($this->connector);
    }

    public function studentDocuments(): StudentDocumentsResource
    {
        return new StudentDocumentsResource($this->connector);
    }

    public function studentInventory(): StudentInventoryResource
    {
        return new StudentInventoryResource($this->connector);
    }

    public function studentMedication(): StudentMedicationResource
    {
        return new StudentMedicationResource($this->connector);
    }

    public function studentNotes(): StudentNotesResource
    {
        return new StudentNotesResource($this->connector);
    }

    public function studentVaccinations(): StudentVaccinationsResource
    {
        return new StudentVaccinationsResource($this->connector);
    }

    public function studentVisits(): StudentVisitsResource
    {
        return new StudentVisitsResource($this->connector);
    }

    public function surgeries(): SurgeriesResource
    {
        return new SurgeriesResource($this->connector);
    }

    public function vaccination(): VaccinationResource
    {
        return new VaccinationResource($this->connector);
    }

    public function visit(): VisitResource
    {
        return new VisitResource($this->connector);
    }
}
