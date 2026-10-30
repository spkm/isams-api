<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Resources;

use Saloon\Http\BaseResource;
use Saloon\Http\Response;
use spkm\IsamsApi\Resources\Timetable\DepartmentTimetablesResource;
use spkm\IsamsApi\Resources\Timetable\EmployeeTimetablesResource;
use spkm\IsamsApi\Resources\Timetable\FormTimetablesResource;
use spkm\IsamsApi\Resources\Timetable\ImportResource;
use spkm\IsamsApi\Resources\Timetable\RoomTimetablesResource;
use spkm\IsamsApi\Resources\Timetable\SetTimetablesResource;
use spkm\IsamsApi\Resources\Timetable\StructuresResource;
use spkm\IsamsApi\Resources\Timetable\StudentTimetablesResource;
use spkm\IsamsApi\Resources\Timetable\SubjectTimetablesResource;

class TimetableResource extends BaseResource
{
    public function departmentTimetables(): DepartmentTimetablesResource
    {
        return new DepartmentTimetablesResource($this->connector);
    }

    public function employeeTimetables(): EmployeeTimetablesResource
    {
        return new EmployeeTimetablesResource($this->connector);
    }

    public function formTimetables(): FormTimetablesResource
    {
        return new FormTimetablesResource($this->connector);
    }

    public function import(): ImportResource
    {
        return new ImportResource($this->connector);
    }

    public function roomTimetables(): RoomTimetablesResource
    {
        return new RoomTimetablesResource($this->connector);
    }

    public function setTimetables(): SetTimetablesResource
    {
        return new SetTimetablesResource($this->connector);
    }

    public function structures(): StructuresResource
    {
        return new StructuresResource($this->connector);
    }

    public function studentTimetables(): StudentTimetablesResource
    {
        return new StudentTimetablesResource($this->connector);
    }

    public function subjectTimetables(): SubjectTimetablesResource
    {
        return new SubjectTimetablesResource($this->connector);
    }
}
