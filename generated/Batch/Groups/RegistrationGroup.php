<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Batch\Groups;

use DateTimeInterface;
use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchGroup;
use spkm\IsamsApi\Data\Batch\RegistrationManager\DatesAndTimes\DateTime;
use spkm\IsamsApi\Data\Batch\RegistrationManager\OutOfSchool\Pupil;
use spkm\IsamsApi\Data\Batch\RegistrationManager\PresentCodes\PresentCode;
use spkm\IsamsApi\Data\Batch\RegistrationManager\RegistrationCodes\RegistrationCode;
use spkm\IsamsApi\Data\Batch\RegistrationManager\RegistrationPeriods\RegistrationPeriod;
use spkm\IsamsApi\Data\Batch\RegistrationManager\RegistrationStatuses\RegistrationStatus;

class RegistrationGroup extends BatchGroup
{
    /**
     * @return Collection<int, RegistrationCode>
     */
    public function codes(): Collection
    {
        return $this->run('Registration_GetRegistrationCodes', RegistrationCode::class);
    }

    /**
     * @return Collection<int, DateTime>
     */
    public function datesAndTimes(): Collection
    {
        return $this->run('Registration_GetDatesAndTimes', DateTime::class);
    }

    /**
     * @return Collection<int, Pupil>
     */
    public function outOfSchoolPupils(DateTimeInterface $startDate, DateTimeInterface $endDate): Collection
    {
        return $this->run('Registration_GetOutOfSchoolPupils', Pupil::class, ['module' => 'Registration', 'element' => 'OutOfSchoolPupils', 'attributes' => ['StartDate' => $startDate, 'EndDate' => $endDate], 'required' => true]);
    }

    /**
     * @return Collection<int, RegistrationPeriod>
     */
    public function periods(DateTimeInterface $startDate, DateTimeInterface $endDate): Collection
    {
        return $this->run('Registration_GetRegistrationPeriods', RegistrationPeriod::class, ['module' => 'Registration', 'element' => 'RegistrationPeriods', 'attributes' => ['StartDate' => $startDate, 'EndDate' => $endDate], 'required' => true]);
    }

    /**
     * @return Collection<int, PresentCode>
     */
    public function presentCodes(): Collection
    {
        return $this->run('Registration_GetPresentCodes', PresentCode::class);
    }

    /**
     * @return Collection<int, RegistrationStatus>
     */
    public function status(DateTimeInterface $startDate, DateTimeInterface $endDate): Collection
    {
        return $this->run('Registration_GetRegistrationStatus', RegistrationStatus::class, ['module' => 'Registration', 'element' => 'RegistrationStatus', 'attributes' => ['StartDate' => $startDate, 'EndDate' => $endDate], 'required' => true]);
    }
}
