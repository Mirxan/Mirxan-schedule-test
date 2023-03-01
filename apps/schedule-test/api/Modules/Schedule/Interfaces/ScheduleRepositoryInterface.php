<?php

namespace Modules\Schedule\Interfaces;

interface ScheduleRepositoryInterface 
{
    public function getAllSchedules(array $request);
    public function getListSchedules();
    public function getScheduleById(int $id);
    public function createSchedule(array $item);
    public function updateSchedule(int $id, array $newItem);
    public function deleteSchedule(int $id);
}