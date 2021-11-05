<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class BanckCardRequest extends FormRequest
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
                'identifier' => 'required|integer|digits_between:1,191',
                'bank_id' => 'required|integer|exists:banks,id'
            ];
 
        }else{

            $myRules = [
                'name' => 'required|string|max:191',
                'identifier' => 'required|integer|digits_between:1,191',
                'bank_id' => 'required|integer|exists:banks,id'
            ];

        }

        return $myRules;
    }
}
