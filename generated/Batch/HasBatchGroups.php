<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Batch;

use spkm\IsamsApi\Batch\Groups\AgentGroup;
use spkm\IsamsApi\Batch\Groups\CalendarGroup;
use spkm\IsamsApi\Batch\Groups\ContactAdvancedGroup;
use spkm\IsamsApi\Batch\Groups\ControlPanelGroup;
use spkm\IsamsApi\Batch\Groups\CoverGroup;
use spkm\IsamsApi\Batch\Groups\DailyBulletinGroup;
use spkm\IsamsApi\Batch\Groups\DisciplineGroup;
use spkm\IsamsApi\Batch\Groups\EstateGroup;
use spkm\IsamsApi\Batch\Groups\ExternalExamsGroup;
use spkm\IsamsApi\Batch\Groups\HumanResourcesGroup;
use spkm\IsamsApi\Batch\Groups\NewsGroup;
use spkm\IsamsApi\Batch\Groups\OffGamesGroup;
use spkm\IsamsApi\Batch\Groups\OtherSchoolsGroup;
use spkm\IsamsApi\Batch\Groups\PupilGroup;
use spkm\IsamsApi\Batch\Groups\PupilRegistersGroup;
use spkm\IsamsApi\Batch\Groups\RegistrationGroup;
use spkm\IsamsApi\Batch\Groups\RewardsAndConductGroup;
use spkm\IsamsApi\Batch\Groups\SENManagerGroup;
use spkm\IsamsApi\Batch\Groups\SchoolGroup;
use spkm\IsamsApi\Batch\Groups\SchoolReportsGroup;
use spkm\IsamsApi\Batch\Groups\TeachingGroup;
use spkm\IsamsApi\Batch\Groups\TimetableGroup;
use spkm\IsamsApi\Batch\Groups\TrackingGroup;

trait HasBatchGroups
{
    public function agent(): AgentGroup
    {
        return new AgentGroup($this);
    }

    public function calendar(): CalendarGroup
    {
        return new CalendarGroup($this);
    }

    public function contactAdvanced(): ContactAdvancedGroup
    {
        return new ContactAdvancedGroup($this);
    }

    public function controlPanel(): ControlPanelGroup
    {
        return new ControlPanelGroup($this);
    }

    public function cover(): CoverGroup
    {
        return new CoverGroup($this);
    }

    public function dailyBulletin(): DailyBulletinGroup
    {
        return new DailyBulletinGroup($this);
    }

    public function discipline(): DisciplineGroup
    {
        return new DisciplineGroup($this);
    }

    public function estate(): EstateGroup
    {
        return new EstateGroup($this);
    }

    public function externalExams(): ExternalExamsGroup
    {
        return new ExternalExamsGroup($this);
    }

    public function humanResources(): HumanResourcesGroup
    {
        return new HumanResourcesGroup($this);
    }

    public function news(): NewsGroup
    {
        return new NewsGroup($this);
    }

    public function offGames(): OffGamesGroup
    {
        return new OffGamesGroup($this);
    }

    public function otherSchools(): OtherSchoolsGroup
    {
        return new OtherSchoolsGroup($this);
    }

    public function pupil(): PupilGroup
    {
        return new PupilGroup($this);
    }

    public function pupilRegisters(): PupilRegistersGroup
    {
        return new PupilRegistersGroup($this);
    }

    public function registration(): RegistrationGroup
    {
        return new RegistrationGroup($this);
    }

    public function rewardsAndConduct(): RewardsAndConductGroup
    {
        return new RewardsAndConductGroup($this);
    }

    public function senManager(): SENManagerGroup
    {
        return new SENManagerGroup($this);
    }

    public function school(): SchoolGroup
    {
        return new SchoolGroup($this);
    }

    public function schoolReports(): SchoolReportsGroup
    {
        return new SchoolReportsGroup($this);
    }

    public function teaching(): TeachingGroup
    {
        return new TeachingGroup($this);
    }

    public function timetable(): TimetableGroup
    {
        return new TimetableGroup($this);
    }

    public function tracking(): TrackingGroup
    {
        return new TrackingGroup($this);
    }
}
