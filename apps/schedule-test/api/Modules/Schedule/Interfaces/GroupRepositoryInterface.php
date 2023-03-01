<?php

namespace Modules\Schedule\Interfaces;

interface GroupRepositoryInterface 
{
    public function getAllGroups();
    public function getGroupById(int $id);
    public function createGroup(array $item);
    public function updateGroup(int $id, array $newItem);
    public function deleteGroup(int $id);
}