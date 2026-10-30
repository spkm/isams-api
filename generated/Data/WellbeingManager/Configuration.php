<?php

/**
 * Generated from the iSAMS API spec by bin/generate: edit generator/overrides.php instead.
 */

namespace spkm\IsamsApi\Data\WellbeingManager;

use spkm\IsamsApi\Data\Data;

readonly class Configuration extends Data
{
    /**
     * @param  list<int>  $concernNotificationRoles
     * @param  list<int>  $indicatorNotificationRoles
     * @param  list<int>  $lifeEventNotificationRoles
     */
    public function __construct(
        public ?int $id = null,
        public ?bool $concernActionNotifications = null,
        public array $concernNotificationRoles = [],
        public ?bool $concernNotifications = null,
        public ?bool $flagVisibleRegistration = null,
        public ?bool $flagVisibleStudentManager = null,
        public ?bool $flagVisibleStudentProfiles = null,
        public ?bool $girfecEnabled = null,
        public array $indicatorNotificationRoles = [],
        public ?bool $indicatorNotifications = null,
        public array $lifeEventNotificationRoles = [],
        public ?bool $lifeEventNotifications = null,
    ) {
    }
}
