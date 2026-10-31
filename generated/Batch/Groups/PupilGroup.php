<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Batch\Groups;

use Illuminate\Support\LazyCollection;
use spkm\IsamsApi\Batch\BatchGroup;
use spkm\IsamsApi\Data\Batch\PupilManager\CustomGroupCategory\Category;
use spkm\IsamsApi\Data\Batch\PupilManager\CustomPupilGroupMembershipItems\CustomPupilGroupMembershipItem;
use spkm\IsamsApi\Data\Batch\PupilManager\CustomPupilGroups\CustomPupilGroup;

class PupilGroup extends BatchGroup
{
    /**
     * @return LazyCollection<int, \spkm\IsamsApi\Data\Batch\PupilManager\Alumni\Pupil>
     */
    public function alumni(): LazyCollection
    {
        return $this->run('Pupil_GetAlumni', \spkm\IsamsApi\Data\Batch\PupilManager\Alumni\Pupil::class);
    }

    /**
     * @return LazyCollection<int, \spkm\IsamsApi\Data\Batch\PupilManager\Applicants\Pupil>
     */
    public function applicants(): LazyCollection
    {
        return $this->run('Pupil_GetApplicants', \spkm\IsamsApi\Data\Batch\PupilManager\Applicants\Pupil::class);
    }

    /**
     * @return LazyCollection<int, \spkm\IsamsApi\Data\Batch\PupilManager\Applicants\Pupil>
     */
    public function applicantsWithCustomFields(): LazyCollection
    {
        return $this->run('Pupil_GetApplicantsWithCustomFields', \spkm\IsamsApi\Data\Batch\PupilManager\Applicants\Pupil::class);
    }

    /**
     * @return LazyCollection<int, \spkm\IsamsApi\Data\Batch\PupilManager\CurrentPupils\Pupil>
     */
    public function currentPupils(): LazyCollection
    {
        return $this->run('Pupil_GetCurrentPupils', \spkm\IsamsApi\Data\Batch\PupilManager\CurrentPupils\Pupil::class);
    }

    /**
     * @return LazyCollection<int, \spkm\IsamsApi\Data\Batch\PupilManager\CurrentPupilsHealth\Pupil>
     */
    public function currentPupilsHealth(): LazyCollection
    {
        return $this->run('Pupil_GetCurrentPupilsHealth', \spkm\IsamsApi\Data\Batch\PupilManager\CurrentPupilsHealth\Pupil::class);
    }

    /**
     * @return LazyCollection<int, \spkm\IsamsApi\Data\Batch\PupilManager\CurrentPupilsHealth\Pupil>
     */
    public function currentPupilsHealthWithCustomFields(): LazyCollection
    {
        return $this->run('Pupil_GetCurrentPupilsHealthWithCustomFields', \spkm\IsamsApi\Data\Batch\PupilManager\CurrentPupilsHealth\Pupil::class);
    }

    /**
     * @return LazyCollection<int, \spkm\IsamsApi\Data\Batch\PupilManager\CurrentPupilsTransport\Pupil>
     */
    public function currentPupilsTransport(): LazyCollection
    {
        return $this->run('Pupil_GetCurrentPupilsTransport', \spkm\IsamsApi\Data\Batch\PupilManager\CurrentPupilsTransport\Pupil::class);
    }

    /**
     * @return LazyCollection<int, \spkm\IsamsApi\Data\Batch\PupilManager\CurrentPupilsTransport\Pupil>
     */
    public function currentPupilsTransportWithCustomFields(): LazyCollection
    {
        return $this->run('Pupil_GetCurrentPupilsTransportWithCustomFields', \spkm\IsamsApi\Data\Batch\PupilManager\CurrentPupilsTransport\Pupil::class);
    }

    /**
     * @return LazyCollection<int, \spkm\IsamsApi\Data\Batch\PupilManager\CurrentPupils\Pupil>
     */
    public function currentPupilsWithCustomFields(): LazyCollection
    {
        return $this->run('Pupil_GetCurrentPupilsWithCustomFields', \spkm\IsamsApi\Data\Batch\PupilManager\CurrentPupils\Pupil::class);
    }

    /**
     * @return LazyCollection<int, Category>
     */
    public function customGroupCategories(): LazyCollection
    {
        return $this->run('Pupil_GetCustomGroupCategories', Category::class);
    }

    /**
     * @return LazyCollection<int, CustomPupilGroupMembershipItem>
     */
    public function customPupilGroupMembership(): LazyCollection
    {
        return $this->run('Pupil_GetCustomPupilGroupMembership', CustomPupilGroupMembershipItem::class);
    }

    /**
     * @param  list<int|string>  $systemStatusesToInclude
     * @return LazyCollection<int, CustomPupilGroupMembershipItem>
     */
    public function customPupilGroupMembershipFiltered(array $systemStatusesToInclude): LazyCollection
    {
        return $this->run('Pupil_GetCustomPupilGroupMembershipFiltered', CustomPupilGroupMembershipItem::class, ['module' => 'StudentManager', 'element' => 'CustomPupilGroupMembershipFiltered', 'attributes' => ['SystemStatusesToInclude' => $systemStatusesToInclude], 'required' => true]);
    }

    /**
     * @return LazyCollection<int, CustomPupilGroup>
     */
    public function customPupilGroups(): LazyCollection
    {
        return $this->run('Pupil_GetCustomPupilGroups', CustomPupilGroup::class);
    }

    /**
     * @param  list<int|string>  $systemStatusesToInclude
     * @return LazyCollection<int, \spkm\IsamsApi\Data\Batch\PupilManager\CurrentPupilsPassports\Pupil>
     */
    public function passports(array $systemStatusesToInclude): LazyCollection
    {
        return $this->run('Pupil_GetPassports', \spkm\IsamsApi\Data\Batch\PupilManager\CurrentPupilsPassports\Pupil::class, ['module' => 'StudentManager', 'element' => 'Passports', 'attributes' => ['SystemStatusesToInclude' => $systemStatusesToInclude], 'required' => true]);
    }

    /**
     * @return LazyCollection<int, \spkm\IsamsApi\Data\Batch\PupilManager\Siblings\Pupil>
     */
    public function siblings(): LazyCollection
    {
        return $this->run('Pupil_GetSiblings', \spkm\IsamsApi\Data\Batch\PupilManager\Siblings\Pupil::class);
    }
}
