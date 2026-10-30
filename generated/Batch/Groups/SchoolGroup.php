<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Batch\Groups;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchGroup;
use spkm\IsamsApi\Data\Batch\SchoolManager\Forms\Form;
use spkm\IsamsApi\Data\Batch\SchoolManager\PastoralTutors\StaffMember;
use spkm\IsamsApi\Data\Batch\SchoolManager\SchoolDivisions\SchoolDivision;
use spkm\IsamsApi\Data\Batch\SchoolManager\Terms\Term;
use spkm\IsamsApi\Data\Batch\SchoolManager\Years\Year;

class SchoolGroup extends BatchGroup
{
    /**
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\SchoolManager\AcademicHouses\House>
     */
    public function academicHouses(): Collection
    {
        return $this->run('School_GetAcademicHouses', \spkm\IsamsApi\Data\Batch\SchoolManager\AcademicHouses\House::class);
    }

    /**
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\SchoolManager\BoardingHouses\House>
     */
    public function boardingHouses(): Collection
    {
        return $this->run('School_GetBoardingHouses', \spkm\IsamsApi\Data\Batch\SchoolManager\BoardingHouses\House::class);
    }

    /**
     * @return Collection<int, SchoolDivision>
     */
    public function divisions(): Collection
    {
        return $this->run('School_GetSchoolDivisions', SchoolDivision::class);
    }

    /**
     * @return Collection<int, Form>
     */
    public function forms(): Collection
    {
        return $this->run('School_GetSchoolForms', Form::class);
    }

    /**
     * @return Collection<int, StaffMember>
     */
    public function pastoralTutors(): Collection
    {
        return $this->run('School_GetPastoralTutors', StaffMember::class);
    }

    /**
     * @return Collection<int, Term>
     */
    public function terms(): Collection
    {
        return $this->run('School_GetSchoolTerms', Term::class);
    }

    /**
     * @return Collection<int, Year>
     */
    public function years(): Collection
    {
        return $this->run('School_GetAllYears', Year::class);
    }
}
