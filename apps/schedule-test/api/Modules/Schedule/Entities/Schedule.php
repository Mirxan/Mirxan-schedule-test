<?php

namespace Modules\Schedule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'teacher_id',
        'group_id',
        'room_id',
        'date',
        'start_time',
        'end_time',
    ];

    protected static function newFactory()
    {
        // return \Modules\Schedule\Database\factories\ScheduleFactory::new();
    }

    public function teachers(){
        return $this->belongsTo(Teacher::class,'teacher_id');
    }

    public function rooms(){
        return $this->belongsTo(Room::class,'room_id');
    }

    public function groups(){
        return $this->belongsTo(Group::class,'group_id');
    }
}
