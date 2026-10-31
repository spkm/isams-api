<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Batch\Groups;

use Illuminate\Support\LazyCollection;
use spkm\IsamsApi\Batch\BatchGroup;
use spkm\IsamsApi\Data\Batch\SchoolManager\Forms\Form;
use spkm\IsamsApi\Data\Batch\SchoolManager\House;
use spkm\IsamsApi\Data\Batch\SchoolManager\PastoralTutors\StaffMember;
use spkm\IsamsApi\Data\Batch\SchoolManager\SchoolDivisions\SchoolDivision;
use spkm\IsamsApi\Data\Batch\SchoolManager\Terms\Term;
use spkm\IsamsApi\Data\Batch\SchoolManager\Years\Year;

class SchoolGroup extends BatchGroup
{
    /**
     * @return LazyCollection<int, House>
     */
    public function academicHouses(): LazyCollection
    {
        return $this->run('School_GetAcademicHouses', House::class);
    }

    /**
     * @return LazyCollection<int, House>
     */
    public function boardingHouses(): LazyCollection
    {
        return $this->run('School_GetBoardingHouses', House::class);
    }

    /**
     * @return LazyCollection<int, SchoolDivision>
     */
    public function divisions(): LazyCollection
    {
        return $this->run('School_GetSchoolDivisions', SchoolDivision::class);
    }

    /**
     * @return LazyCollection<int, Form>
     */
    public function forms(): LazyCollection
    {
        return $this->run('School_GetSchoolForms', Form::class);
    }

    /**
     * @return LazyCollection<int, StaffMember>
     */
    public function pastoralTutors(): LazyCollection
    {
        return $this->run('School_GetPastoralTutors', StaffMember::class);
    }

    /**
     * @return LazyCollection<int, Term>
     */
    public function terms(): LazyCollection
    {
        return $this->run('School_GetSchoolTerms', Term::class);
    }

    /**
     * @return LazyCollection<int, Year>
     */
    public function years(): LazyCollection
    {
        return $this->run('School_GetAllYears', Year::class);
    }
}
