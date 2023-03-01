<?php

namespace Modules\Schedule\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GroupRequest extends FormRequest
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
        $name = "name". ",".$this->group ?? '';
        return [
            'name' => ['required','string', "unique:groups,$name"]
        ];
    }
}
