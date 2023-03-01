<?php

namespace Modules\Schedule\Repositories;


use Modules\Schedule\Interfaces\GroupRepositoryInterface;
use Modules\Schedule\Entities\Group;

class GroupRepository implements GroupRepositoryInterface 
{

    public function __construct(private Group $group)
    {
        $this->group = $group;
    }

    public function getAllGroups() 
    {
        return $this->group->all();
    }

    public function getGroupById(int $id) 
    {
        return $this->group->findOrFail($id);
    }

    public function createGroup(array $item) 
    {
        return $this->group->create($item);
    }

    public function updateGroup(int $id, array $newItem) 
    {
        return tap($this->group->findOrFail($id), function ($item) use ($newItem){
            $item->update($newItem);
        });
    }

    public function deleteGroup(int $id) 
    {
        $this->group->destroy($id);
    }
}
