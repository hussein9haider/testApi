<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        $myRules = array();

        if(request()->route()->id){

            $myRules = [
                'first_name' => 'nullable|string|max:191',
                'last_name' => 'nullable|string|max:191',
                'phone_number' => 'nullable|numeric',
                'phone_country' => 'nullable|numeric',
                'birthday' => 'nullable|string|max:255',
                'status' => 'nullable|string|max:255',
                'email' => 'nullable|email|max:191|unique:admins,email,'.$this->id,
                'password' => 'nullable|string|max:191|min:8|confirmed',
                'photo' => 'nullable|image|mimes:png,jpg|max:10048',
            ];

        }else{

            $myRules = [
                'first_name' => 'required|string|max:191',
                'last_name' => 'required|string|max:191',
                'phone_number' => 'required|numeric',
                'phone_country' => 'required|numeric',
                'birthday' => 'required|string|max:255',
                'status' => 'required|string|max:255',
                'email' => 'required|email|max:191|unique:admins,email',
                'password' => 'required|string|max:191|min:8|confirmed',
                'photo' => 'required|image|mimes:png,jpg|max:10048',
            ];

        }

        return $myRules;
    }
}
