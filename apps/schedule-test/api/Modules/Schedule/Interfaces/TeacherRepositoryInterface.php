<?php

namespace Modules\Schedule\Interfaces;

interface TeacherRepositoryInterface 
{
    public function getAllTeachers();
    public function getTeacherById(int $id);
    public function createTeacher(array $item);
    public function updateTeacher(int $id, array $newItem);
    public function deleteTeacher(int $id);
}