<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Batch\Groups;

use Illuminate\Support\LazyCollection;
use spkm\IsamsApi\Batch\BatchGroup;
use spkm\IsamsApi\Data\Batch\PupilManager\Contacts\Contact;

class ContactAdvancedGroup extends BatchGroup
{
    /**
     * @param  list<int|string>|null  $contactTypes
     * @param  list<int|string>|null  $contactLocations
     * @param  list<int|string>|null  $systemStatusesToInclude
     * @param  list<int|string>|null  $admissionsStatusesToInclude
     * @param  list<int|string>|null  $enrolmentSchoolYearsToInclude
     * @return LazyCollection<int, Contact>
     */
    public function contacts(
        ?array $contactTypes = null,
        ?bool $contactOnly = null,
        ?array $contactLocations = null,
        ?bool $studentHome = null,
        ?array $systemStatusesToInclude = null,
        ?array $admissionsStatusesToInclude = null,
        ?array $enrolmentSchoolYearsToInclude = null,
    ): LazyCollection {
        return $this->run('ContactAdvanced_GetContacts', Contact::class, ['module' => 'StudentManager', 'element' => 'Contacts', 'attributes' => ['ContactTypes' => $contactTypes, 'ContactOnly' => $contactOnly, 'ContactLocations' => $contactLocations, 'StudentHome' => $studentHome, 'SystemStatusesToInclude' => $systemStatusesToInclude, 'AdmissionsStatusesToInclude' => $admissionsStatusesToInclude, 'EnrolmentSchoolYearsToInclude' => $enrolmentSchoolYearsToInclude], 'required' => true]);
    }

    /**
     * @param  list<int|string>|null  $contactTypes
     * @param  list<int|string>|null  $contactLocations
     * @param  list<int|string>|null  $systemStatusesToInclude
     * @param  list<int|string>|null  $admissionsStatusesToInclude
     * @param  list<int|string>|null  $enrolmentSchoolYearsToInclude
     * @return LazyCollection<int, Contact>
     */
    public function contactsWithCustomFields(
        ?array $contactTypes = null,
        ?bool $contactOnly = null,
        ?array $contactLocations = null,
        ?bool $studentHome = null,
        ?array $systemStatusesToInclude = null,
        ?array $admissionsStatusesToInclude = null,
        ?array $enrolmentSchoolYearsToInclude = null,
    ): LazyCollection {
        return $this->run('ContactAdvanced_GetContactsWithCustomFields', Contact::class, ['module' => 'StudentManager', 'element' => 'ContactsWithCustomFields', 'attributes' => ['ContactTypes' => $contactTypes, 'ContactOnly' => $contactOnly, 'ContactLocations' => $contactLocations, 'StudentHome' => $studentHome, 'SystemStatusesToInclude' => $systemStatusesToInclude, 'AdmissionsStatusesToInclude' => $admissionsStatusesToInclude, 'EnrolmentSchoolYearsToInclude' => $enrolmentSchoolYearsToInclude], 'required' => true]);
    }
}
