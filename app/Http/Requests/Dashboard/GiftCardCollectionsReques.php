<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class GiftCardCollectionsReques extends FormRequest
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
                'country_id' => 'nullable|exists:countries,id',
                'name' => 'nullable|string',
                'name_ar' => 'nullable|string',
                'status' => 'nullable|string',
                'name_tr' => 'nullable|string',

            ];

        }else{

            $myRules = [
                'country_id' => 'nullable|exists:countries,id',
                'name' => 'nullable|string',
                'name_ar' => 'nullable|string',
                'status' => 'nullable|string',
                'name_tr' => 'nullable|string',
            ];

        }

        return $myRules;
    }
}
