<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Batch\Groups;

use Illuminate\Support\LazyCollection;
use spkm\IsamsApi\Batch\BatchGroup;
use spkm\IsamsApi\Data\Batch\OtherSchools\BoardingTypes\BoardingType;
use spkm\IsamsApi\Data\Batch\OtherSchools\GovernanceTypes\GovernanceType;
use spkm\IsamsApi\Data\Batch\OtherSchools\IntakeTypes\IntakeType;
use spkm\IsamsApi\Data\Batch\OtherSchools\SchoolTypes\SchoolType;
use spkm\IsamsApi\Data\Batch\OtherSchools\Schools\School;

class OtherSchoolsGroup extends BatchGroup
{
    /**
     * @return LazyCollection<int, School>
     */
    public function all(): LazyCollection
    {
        return $this->run('OtherSchools_GetOtherSchools', School::class);
    }

    /**
     * @return LazyCollection<int, BoardingType>
     */
    public function boardingTypes(): LazyCollection
    {
        return $this->run('OtherSchools_BoardingTypes', BoardingType::class);
    }

    /**
     * @return LazyCollection<int, GovernanceType>
     */
    public function governanceTypes(): LazyCollection
    {
        return $this->run('OtherSchools_GovernanceTypes', GovernanceType::class);
    }

    /**
     * @return LazyCollection<int, IntakeType>
     */
    public function intakeTypes(): LazyCollection
    {
        return $this->run('OtherSchools_IntakeTypes', IntakeType::class);
    }

    /**
     * @return LazyCollection<int, SchoolType>
     */
    public function schoolTypes(): LazyCollection
    {
        return $this->run('OtherSchools_GetSchoolTypes', SchoolType::class);
    }
}
