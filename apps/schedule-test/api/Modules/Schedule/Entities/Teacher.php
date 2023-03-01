<?php

namespace Modules\Schedule\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'middlename',
        'age',
        'birthday',
        'experience_year',
        'extra_info',
    ];
    
    protected static function newFactory()
    {
        // return \Modules\Schedule\Database\factories\TeacherFactory::new();
    }
}
