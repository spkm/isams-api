<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Batch\Groups;

use Illuminate\Support\Collection;
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
     * @return Collection<int, ExamArrangement>
     */
    public function examArrangements(): Collection
    {
        return $this->run('ExternalExams_GetExamArrangements', ExamArrangement::class);
    }

    /**
     * @return Collection<int, ExamCentre>
     */
    public function examCentres(): Collection
    {
        return $this->run('ExternalExams_GetExamCentres', ExamCentre::class);
    }

    /**
     * @return Collection<int, ExamCycle>
     */
    public function examCycles(): Collection
    {
        return $this->run('ExternalExams_GetExamCycles', ExamCycle::class);
    }

    /**
     * @return Collection<int, ExamEntry>
     */
    public function examEntries(): Collection
    {
        return $this->run('ExternalExams_GetExamEntries', ExamEntry::class);
    }

    /**
     * @param  list<int|string>|null  $examCycleIdsToInclude
     * @return Collection<int, ExamResult>
     */
    public function examResults(?array $examCycleIdsToInclude = null): Collection
    {
        return $this->run('ExternalExams_GetExamResults', ExamResult::class, ['module' => 'ExamsManager', 'element' => 'ExamResultsFiltered', 'attributes' => ['ExamCycleIdsToInclude' => $examCycleIdsToInclude], 'required' => false]);
    }

    /**
     * @return Collection<int, Qualification>
     */
    public function qualifications(): Collection
    {
        return $this->run('ExternalExams_GetQualifications', Qualification::class);
    }

    /**
     * @return Collection<int, UABGroup>
     */
    public function uabGroups(): Collection
    {
        return $this->run('ExternalExams_GetUABGroups', UABGroup::class);
    }

    /**
     * @return Collection<int, UABIdentifier>
     */
    public function uabIdentifiers(): Collection
    {
        return $this->run('ExternalExams_GetUABIdentifiers', UABIdentifier::class);
    }
}
