<?php

namespace Modules\Schedule\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RoomRequest extends FormRequest
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
            'name' => ['required','string',$this->uniqueRule()],
            'number' => ['required','integer'],
        ];
    }

    public function uniqueRule(){
        $rule = Rule::unique('rooms')->where(function ($query){
            return $query->where('name', request()->input('name'))
            ->where('number', request()->input('number'));
        });
        if($this->room)$rule->ignore($this->room);
        return $rule;
    }
}
