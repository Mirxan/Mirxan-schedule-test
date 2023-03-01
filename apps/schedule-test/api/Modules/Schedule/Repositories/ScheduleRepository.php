<?php

namespace Modules\Schedule\Repositories;

use Modules\Schedule\Interfaces\ScheduleRepositoryInterface;
use Modules\Schedule\Entities\Schedule;

class ScheduleRepository implements ScheduleRepositoryInterface 
{

    public function __construct(private Schedule $schedule)
    {
        $this->schedule = $schedule;
    }

    public function getAllSchedules($request) 
    {
        return $this->schedule
            ->with(['teachers','groups','rooms'])
            ->when(isset($request['teacher_id']) && !empty($request['teacher_id']),function($query)use($request){
                $query->where('teacher_id',$request['teacher_id']);
            })
            ->when(isset($request['group_id']) && !empty($request['group_id']),function($query)use($request){
                $query->where('group_id',$request['group_id']);
            })
            ->when(isset($request['room_id']) && !empty($request['room_id']),function($query)use($request){
                $query->where('room_id',$request['room_id']);
            })
            ->when(isset($request['date']) && !empty($request['date']),function($query)use($request){
                $query->where('date',$request['date']);
            })
            ->when(
                isset($request['start_time']) && isset($request['end_time']) &&
                !empty($request['start_time']) && !empty($request['end_time']
            ),function($query)use($request){
                $query->where('start_time','>=',$request['start_time'])
                    ->where('end_time','<=',$request['end_time']);
            })
            ->get();
    }

    public function getListSchedules() 
    {
        return $this->schedule->with(['teachers','groups','rooms'])->get();
    }

    public function getScheduleById(int $id) 
    {
        return $this->schedule->findOrFail($id);
    }

    public function createSchedule(array $item) 
    {
        return $this->schedule->create($item);
    }

    public function updateSchedule(int $id, array $newItem) 
    {
        return tap($this->schedule->findOrFail($id), function ($item) use ($newItem){
            $item->update($newItem);
        });
    }

    public function deleteSchedule(int $id) 
    {
        $this->schedule->destroy($id);
    }
}
