<?php

namespace Modules\Schedule\Repositories;


use Modules\Schedule\Interfaces\TeacherRepositoryInterface;
use Modules\Schedule\Entities\Teacher;

class TeacherRepository implements TeacherRepositoryInterface 
{

    public function __construct(private Teacher $teacher)
    {
        $this->teacher = $teacher;
    }

    public function getAllTeachers() 
    {
        return $this->teacher->all();
    }

    public function getTeacherById(int $id) 
    {
        return $this->teacher->findOrFail($id);
    }

    public function createTeacher(array $item) 
    {
        return $this->teacher->create($item);
    }

    public function updateTeacher(int $id, array $newItem) 
    {
        return tap($this->teacher->findOrFail($id), function ($item) use ($newItem){
            $item->update($newItem);
        });
    }

    public function deleteTeacher(int $id) 
    {
        $this->teacher->destroy($id);
    }
}
