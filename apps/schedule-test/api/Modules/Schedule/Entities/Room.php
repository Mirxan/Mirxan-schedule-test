<?php

namespace Modules\Schedule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'number',
    ];
    
    protected static function newFactory()
    {
        // return \Modules\Schedule\Database\factories\RoomFactory::new();
    }
}
