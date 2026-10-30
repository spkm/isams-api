<?php

/**
 * Generated from the iSAMS Batch API node lists by bin/generate: edit generator/batch/nodes.php instead.
 */

namespace spkm\IsamsApi\Batch\Groups;

use Illuminate\Support\Collection;
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
     * @return Collection<int, ContactType>
     */
    public function contactTypeGlobalList(): Collection
    {
        return $this->run('ControlPanel_GetContactTypeGlobalList', ContactType::class);
    }

    /**
     * @return Collection<int, GlobalList>
     */
    public function globalLists(): Collection
    {
        return $this->run('ControlPanel_GetAllGlobalLists', GlobalList::class);
    }

    /**
     * @return Collection<int, Groups>
     */
    public function groupedModules(): Collection
    {
        return $this->run('ControlPanel_GetGroupedModules', Groups::class);
    }

    /**
     * @return Collection<int, Permission>
     */
    public function modulePermissions(): Collection
    {
        return $this->run('ControlPanel_GetModulePermissions', Permission::class);
    }

    /**
     * @return Collection<int, Group>
     */
    public function userGroups(): Collection
    {
        return $this->run('ControlPanel_GetAllUserGroups', Group::class);
    }

    /**
     * @return Collection<int, User>
     */
    public function users(): Collection
    {
        return $this->run('ControlPanel_GetAllUsers', User::class);
    }
}
