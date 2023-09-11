<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
                    case 'sign_up':
                        $rules = [
                            "name" => "required",
                            "email" => "required|email|unique:users",
                            "password" => "required",
                        ];
                        break;
                        case 'login':
                            $rules = [
                                
                                "email" => "required",
                                "password" => "required",
                            ];
                            break;
                endswitch;
        endswitch;
        return $rules;
    }
    public function messages()
    {
        return [
            'name.required' => 'bắt buộc nhập name',
            'email.required'=> 'baat buộc nhập email',
            'email.email'=> 'bắt buộc phai la email',
            'email.unique'=> 'email đã tồn tại',
            'password.required'=> 'bbắt buộc nhập password',
        ];

        
    }
    }
