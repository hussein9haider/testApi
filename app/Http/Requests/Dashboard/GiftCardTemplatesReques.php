<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class GiftCardTemplatesReques extends FormRequest
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
                'currency_id' => 'nullable|exists:currencies,id',
                'brand_id' => 'nullable|exists:brands,id',
                'gift_card_collection_id' => 'nullable|exists:gift_card_collections,id',

                'name' => 'nullable|string',
                'name_ar' => 'nullable|string',
                'name_tr' => 'nullable|string',
                'status' => 'nullable|string',

                'image_url' => 'nullable|image|mimes:png,jpg|max:10048',
                'image_url_ar' => 'nullable|image|mimes:png,jpg|max:10048',
                'image_url_tr' => 'nullable|image|mimes:png,jpg|max:10048',

                'available_from' => 'nullable|string',
                'available_until' => 'nullable|string',
                'time_zone_identifier' => 'nullable|string',
                'purchased_count' => 'nullable|numeric',
                'redeemed_count' => 'nullable|numeric',
                'is_featured' => 'nullable|string',
                'max_limit' => 'nullable|numeric',
                'min_limit' => 'nullable|numeric',
                'percent_paid_by_cofe' => 'nullable|string',
                'percent_paid_by_vendor' => 'nullable|string',




            ];

        }else{

            $myRules = [
                'country_id' => 'required|exists:countries,id',
                'currency_id' => 'required|exists:currencies,id',
                'brand_id' => 'required|exists:brands,id',
                'gift_card_collection_id' => 'required|exists:gift_card_collections,id',

                'name' => 'required|string',
                'name_ar' => 'required|string',
                'name_tr' => 'required|string',
                'status' => 'required|string',

                'image_url' => 'required|image|mimes:png,jpg|max:10048',
                'image_url_ar' => 'required|image|mimes:png,jpg|max:10048',
                'image_url_tr' => 'required|image|mimes:png,jpg|max:10048',

                'available_from' => 'required|string',
                'available_until' => 'required|string',
                'time_zone_identifier' => 'required|string',
                'purchased_count' => 'required|numeric',
                'redeemed_count' => 'required|numeric',
                'is_featured' => 'required|string',
                'max_limit' => 'required|numeric',
                'min_limit' => 'required|numeric',
                'percent_paid_by_cofe' => 'required|string',
                'percent_paid_by_vendor' => 'required|string',
            ];

        }

        return $myRules;
    }
}
