<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class BannerRequest extends FormRequest
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
                'country_id' => 'required|integer|exists:countries,id',
                'order' => 'required|integer',
                'status' => 'required|in:active,unactive',
                'photo1' => 'nullable|image|mimes:png,jpg',
                'photo2' => 'nullable|image|mimes:png,jpg',
                'photo3' => 'nullable|image|mimes:png,jpg',
            ];
 
        }else{

            $myRules = [
                'country_id' => 'required|integer|exists:countries,id',
                'order' => 'required|integer',
                'status' => 'required|in:active,unactive',
                'photo1' => 'required|image|mimes:png,jpg',
                'photo2' => 'required|image|mimes:png,jpg',
                'photo3' => 'required|image|mimes:png,jpg',
            ];

        }

        return $myRules;
    }
}
