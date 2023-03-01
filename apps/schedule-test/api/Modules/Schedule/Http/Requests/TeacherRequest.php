<?php

namespace Modules\Schedule\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TeacherRequest extends FormRequest
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
            'name' => ['required','string'],
            'surname' => ['required','string'],
            'middlename' => ['required','string'],
            'age' => ['nullable','integer'],
            'birthday' => ['nullable','date'],
            'experience_year' => ['nullable','integer'],
            'extra_info' => ['nullable','string'],
        ];
    }
}
