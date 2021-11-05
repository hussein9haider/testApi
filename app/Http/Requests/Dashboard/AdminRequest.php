<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
       
        if(request()->id){

            $myRules = [
                'name' => 'required|string|max:191',
                'email' => 'required|email|max:191|unique:admins,email,'.$this->id,
                'password' => 'nullable|string|max:191|min:8|confirmed',
                'photo' => 'nullable|image|mimes:png,jpg|max:10048',
            ];
 
        }else{

            $myRules = [
                'name' => 'required|string|max:191',
                'email' => 'required|email|max:191|unique:admins,email',
                'password' => 'required|string|max:191|min:8|confirmed',
                'photo' => 'nullable|image|mimes:png,jpg|max:10048',
            ];

        }

        return $myRules;
    }
}
