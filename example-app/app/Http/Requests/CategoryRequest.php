<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [];
        // lay ra phuong thuc hoat dong
        $currentAction = $this->route()->getActionMethod();
        switch ($this->method()):
            case 'POST':
                switch ($currentAction):
                    case 'add':
                        $rules = [
                            "name" => "required"
                        ];
                        break;
                    case 'edit':
                        $rules = [
                            "name" => "required"
                        ];
                        break;

                endswitch;
        endswitch;
        return $rules;
    }
    public function messages()
    {
        return [
            'name.required' => 'baat buoc nhap name',

        ];
    }
}
