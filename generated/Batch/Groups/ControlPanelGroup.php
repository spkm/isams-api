<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Batch\Groups;

use Illuminate\Support\LazyCollection;
use spkm\IsamsApi\Batch\BatchGroup;
use spkm\IsamsApi\Data\Batch\ControlPanel\ContactTypes\ContactType;
use spkm\IsamsApi\Data\Batch\ControlPanel\GlobalLists\GlobalList;
use spkm\IsamsApi\Data\Batch\ControlPanel\Modules\Groups;
use spkm\IsamsApi\Data\Batch\ControlPanel\Permissions\Permission;
use spkm\IsamsApi\Data\Batch\ControlPanel\UserGroups\Group;
use spkm\IsamsApi\Data\Batch\ControlPanel\Users\User;

class ControlPanelGroup extends BatchGroup
{
    /**
     * @return LazyCollection<int, ContactType>
     */
    public function contactTypeGlobalList(): LazyCollection
    {
        return $this->run('ControlPanel_GetContactTypeGlobalList', ContactType::class);
    }

    /**
     * @return LazyCollection<int, GlobalList>
     */
    public function globalLists(): LazyCollection
    {
        return $this->run('ControlPanel_GetAllGlobalLists', GlobalList::class);
    }

    /**
     * @return LazyCollection<int, Groups>
     */
    public function groupedModules(): LazyCollection
    {
        return $this->run('ControlPanel_GetGroupedModules', Groups::class);
    }

    /**
     * @return LazyCollection<int, Permission>
     */
    public function modulePermissions(): LazyCollection
    {
        return $this->run('ControlPanel_GetModulePermissions', Permission::class);
    }

    /**
     * @return LazyCollection<int, Group>
     */
    public function userGroups(): LazyCollection
    {
        return $this->run('ControlPanel_GetAllUserGroups', Group::class);
    }

    /**
     * @return LazyCollection<int, User>
     */
    public function users(): LazyCollection
    {
        return $this->run('ControlPanel_GetAllUsers', User::class);
    }
}
