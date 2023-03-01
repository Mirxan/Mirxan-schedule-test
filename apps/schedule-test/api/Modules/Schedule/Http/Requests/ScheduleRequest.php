<?php

namespace Modules\Schedule\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ScheduleRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [];
        if (in_array($this->route()->getActionMethod(),['store','update'])) {
            $rules = $this->storeOrUpdate();
        }
        return $rules;
    }


    public function storeOrUpdate(): array
    {
        return [
            'teacher_id' => ['required','integer',$this->uniqueRule()],
            'group_id' => ['required','integer'],
            'room_id' => ['required','integer'],
            'date' => ['required','date'],
            'start_time' => ['required','date_format:H:i'],
            'end_time' => ['required','date_format:H:i','after_or_equal:start_time'],
        ];
    }

    public function uniqueRule(){
        $rule = Rule::unique('schedules')->where(function ($query){
            return $query->where('teacher_id', request()->input('teacher_id'))
                ->where('group_id', request()->input('group_id'))
                ->where('room_id', request()->input('room_id'))
                ->where('date', request()->input('date'))
                ->where('start_time', request()->input('start_time'))
                ->where('end_time', request()->input('end_time'));
        });
        if($this->my_schedule)$rule->ignore($this->my_schedule);
        return $rule;
    }

}
