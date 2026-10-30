<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Batch\Groups;

use Illuminate\Support\Collection;
use spkm\IsamsApi\Batch\BatchGroup;
use spkm\IsamsApi\Data\Batch\PupilManager\CustomGroupCategory\Category;
use spkm\IsamsApi\Data\Batch\PupilManager\CustomPupilGroups\CustomPupilGroup;

class PupilGroup extends BatchGroup
{
    /**
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\PupilManager\Alumni\Pupil>
     */
    public function alumni(): Collection
    {
        return $this->run('Pupil_GetAlumni', \spkm\IsamsApi\Data\Batch\PupilManager\Alumni\Pupil::class);
    }

    /**
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\PupilManager\Applicants\Pupil>
     */
    public function applicants(): Collection
    {
        return $this->run('Pupil_GetApplicants', \spkm\IsamsApi\Data\Batch\PupilManager\Applicants\Pupil::class);
    }

    /**
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\PupilManager\Applicants\Pupil>
     */
    public function applicantsWithCustomFields(): Collection
    {
        return $this->run('Pupil_GetApplicantsWithCustomFields', \spkm\IsamsApi\Data\Batch\PupilManager\Applicants\Pupil::class);
    }

    /**
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\PupilManager\CurrentPupils\Pupil>
     */
    public function currentPupils(): Collection
    {
        return $this->run('Pupil_GetCurrentPupils', \spkm\IsamsApi\Data\Batch\PupilManager\CurrentPupils\Pupil::class);
    }

    /**
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\PupilManager\CurrentPupilsHealth\Pupil>
     */
    public function currentPupilsHealth(): Collection
    {
        return $this->run('Pupil_GetCurrentPupilsHealth', \spkm\IsamsApi\Data\Batch\PupilManager\CurrentPupilsHealth\Pupil::class);
    }

    /**
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\PupilManager\CurrentPupilsHealth\Pupil>
     */
    public function currentPupilsHealthWithCustomFields(): Collection
    {
        return $this->run('Pupil_GetCurrentPupilsHealthWithCustomFields', \spkm\IsamsApi\Data\Batch\PupilManager\CurrentPupilsHealth\Pupil::class);
    }

    /**
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\PupilManager\CurrentPupilsTransport\Pupil>
     */
    public function currentPupilsTransport(): Collection
    {
        return $this->run('Pupil_GetCurrentPupilsTransport', \spkm\IsamsApi\Data\Batch\PupilManager\CurrentPupilsTransport\Pupil::class);
    }

    /**
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\PupilManager\CurrentPupilsTransport\Pupil>
     */
    public function currentPupilsTransportWithCustomFields(): Collection
    {
        return $this->run('Pupil_GetCurrentPupilsTransportWithCustomFields', \spkm\IsamsApi\Data\Batch\PupilManager\CurrentPupilsTransport\Pupil::class);
    }

    /**
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\PupilManager\CurrentPupils\Pupil>
     */
    public function currentPupilsWithCustomFields(): Collection
    {
        return $this->run('Pupil_GetCurrentPupilsWithCustomFields', \spkm\IsamsApi\Data\Batch\PupilManager\CurrentPupils\Pupil::class);
    }

    /**
     * @return Collection<int, Category>
     */
    public function customGroupCategories(): Collection
    {
        return $this->run('Pupil_GetCustomGroupCategories', Category::class);
    }

    /**
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\PupilManager\CustomPupilGroupMembershipItems\CustomPupilGroupMembershipItem>
     */
    public function customPupilGroupMembership(): Collection
    {
        return $this->run('Pupil_GetCustomPupilGroupMembership', \spkm\IsamsApi\Data\Batch\PupilManager\CustomPupilGroupMembershipItems\CustomPupilGroupMembershipItem::class);
    }

    /**
     * @param  list<int|string>  $systemStatusesToInclude
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\PupilManager\CustomPupilGroupMembershipItems\CustomPupilGroupMembershipItem>
     */
    public function customPupilGroupMembershipFiltered(array $systemStatusesToInclude): Collection
    {
        return $this->run('Pupil_GetCustomPupilGroupMembershipFiltered', \spkm\IsamsApi\Data\Batch\PupilManager\CustomPupilGroupMembershipItems\CustomPupilGroupMembershipItem::class, ['module' => 'StudentManager', 'element' => 'CustomPupilGroupMembershipFiltered', 'attributes' => ['SystemStatusesToInclude' => $systemStatusesToInclude], 'required' => true]);
    }

    /**
     * @return Collection<int, CustomPupilGroup>
     */
    public function customPupilGroups(): Collection
    {
        return $this->run('Pupil_GetCustomPupilGroups', CustomPupilGroup::class);
    }

    /**
     * @param  list<int|string>  $systemStatusesToInclude
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\PupilManager\CurrentPupilsPassports\Pupil>
     */
    public function passports(array $systemStatusesToInclude): Collection
    {
        return $this->run('Pupil_GetPassports', \spkm\IsamsApi\Data\Batch\PupilManager\CurrentPupilsPassports\Pupil::class, ['module' => 'StudentManager', 'element' => 'Passports', 'attributes' => ['SystemStatusesToInclude' => $systemStatusesToInclude], 'required' => true]);
    }

    /**
     * @return Collection<int, \spkm\IsamsApi\Data\Batch\PupilManager\Siblings\Pupil>
     */
    public function siblings(): Collection
    {
        return $this->run('Pupil_GetSiblings', \spkm\IsamsApi\Data\Batch\PupilManager\Siblings\Pupil::class);
    }
}
