<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Batch\Groups;

use Illuminate\Support\LazyCollection;
use spkm\IsamsApi\Batch\BatchGroup;
use spkm\IsamsApi\Data\Batch\ExamsManager\ExamArrangements\ExamArrangement;
use spkm\IsamsApi\Data\Batch\ExamsManager\ExamCentres\ExamCentre;
use spkm\IsamsApi\Data\Batch\ExamsManager\ExamCycles\ExamCycle;
use spkm\IsamsApi\Data\Batch\ExamsManager\ExamEntries\ExamEntry;
use spkm\IsamsApi\Data\Batch\ExamsManager\ExamResults\ExamResult;
use spkm\IsamsApi\Data\Batch\ExamsManager\Qualifications\Qualification;
use spkm\IsamsApi\Data\Batch\ExamsManager\UABGroups\UABGroup;
use spkm\IsamsApi\Data\Batch\ExamsManager\UABIdentifiers\UABIdentifier;

class ExternalExamsGroup extends BatchGroup
{
    /**
     * @return LazyCollection<int, ExamArrangement>
     */
    public function examArrangements(): LazyCollection
    {
        return $this->run('ExternalExams_GetExamArrangements', ExamArrangement::class);
    }

    /**
     * @return LazyCollection<int, ExamCentre>
     */
    public function examCentres(): LazyCollection
    {
        return $this->run('ExternalExams_GetExamCentres', ExamCentre::class);
    }

    /**
     * @return LazyCollection<int, ExamCycle>
     */
    public function examCycles(): LazyCollection
    {
        return $this->run('ExternalExams_GetExamCycles', ExamCycle::class);
    }

    /**
     * @return LazyCollection<int, ExamEntry>
     */
    public function examEntries(): LazyCollection
    {
        return $this->run('ExternalExams_GetExamEntries', ExamEntry::class);
    }

    /**
     * @return LazyCollection<int, ExamResult>
     */
    public function examResults(): LazyCollection
    {
        return $this->run('ExternalExams_GetExamResults', ExamResult::class);
    }

    /**
     * @return LazyCollection<int, Qualification>
     */
    public function qualifications(): LazyCollection
    {
        return $this->run('ExternalExams_GetQualifications', Qualification::class);
    }

    /**
     * @return LazyCollection<int, UABGroup>
     */
    public function uabGroups(): LazyCollection
    {
        return $this->run('ExternalExams_GetUABGroups', UABGroup::class);
    }

    /**
     * @return LazyCollection<int, UABIdentifier>
     */
    public function uabIdentifiers(): LazyCollection
    {
        return $this->run('ExternalExams_GetUABIdentifiers', UABIdentifier::class);
    }
}
