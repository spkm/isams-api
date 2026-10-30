<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Batch\Groups;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchGroup;
use spkm\IsamsApi\Data\Batch\OtherSchools\BoardingTypes\BoardingType;
use spkm\IsamsApi\Data\Batch\OtherSchools\GovernanceTypes\GovernanceType;
use spkm\IsamsApi\Data\Batch\OtherSchools\IntakeTypes\IntakeType;
use spkm\IsamsApi\Data\Batch\OtherSchools\SchoolTypes\SchoolType;
use spkm\IsamsApi\Data\Batch\OtherSchools\Schools\School;

class OtherSchoolsGroup extends BatchGroup
{
    /**
     * @return Collection<int, School>
     */
    public function all(): Collection
    {
        return $this->run('OtherSchools_GetOtherSchools', School::class);
    }

    /**
     * @return Collection<int, BoardingType>
     */
    public function boardingTypes(): Collection
    {
        return $this->run('OtherSchools_BoardingTypes', BoardingType::class);
    }

    /**
     * @return Collection<int, GovernanceType>
     */
    public function governanceTypes(): Collection
    {
        return $this->run('OtherSchools_GovernanceTypes', GovernanceType::class);
    }

    /**
     * @return Collection<int, IntakeType>
     */
    public function intakeTypes(): Collection
    {
        return $this->run('OtherSchools_IntakeTypes', IntakeType::class);
    }

    /**
     * @return Collection<int, SchoolType>
     */
    public function schoolTypes(): Collection
    {
        return $this->run('OtherSchools_GetSchoolTypes', SchoolType::class);
    }
}
