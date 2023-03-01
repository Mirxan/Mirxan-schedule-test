<?php

namespace Modules\Schedule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];
    
    protected static function newFactory()
    {
        // return \Modules\Schedule\Database\factories\GroupFactory::new();
    }
}
