<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class GiftCardRequest extends FormRequest
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
                'gift_card_order_id' => 'nullable|string|max:191',
                'brand_id' => 'nullable|exists:brands,id',
                'country_id' => 'nullable|exists:brands,id',
                'currency_id' => 'nullable|exists:brands,id',
                'gift_card_template_id' => 'nullable|exists:brands,id',
                'sender_id' => 'nullable|exists:brands,id',
                'receiver_id' => 'nullabl|exists:brands,id',
                'image_url' => 'nullable|image|mimes:png,jpg|max:10048',
                'image_url_ar' => 'nullable|image|mimes:png,jpg|max:10048',
                'code' => 'nullable|string',
                'initial_amount' => 'nullable|numeric',
                'amount' => 'nullable|string',
                'anonymous_sender' => 'nullable|string',
                'redeemed_on' => 'nullable|string',
                'status' => 'nullable|string',
                'name' => 'nullable|string',
                'name_ar' => 'nullable|string',
                'message' => 'nullable|string',
                'share_url' => 'nullable|string',
                'name_tr' => 'nullable|string',
                'image_url_tr' => 'nullable|image|mimes:png,jpg|max:10048',

            ];

        }else{

            $myRules = [
                'gift_card_order_id' => 'required|string|max:191',
                'brand_id' => 'required|exists:brands,id',
                'country_id' => 'required|exists:brands,id',
                'currency_id' => 'required|exists:brands,id',
                'gift_card_template_id' => 'required|exists:brands,id',
                'sender_id' => 'required|exists:brands,id',
                'receiver_id' => 'nullabl|exists:brands,id',
                'image_url' => 'required|image|mimes:png,jpg|max:10048',
                'image_url_ar' => 'required|image|mimes:png,jpg|max:10048',
                'code' => 'required|string',
                'initial_amount' => 'required|numeric',
                'amount' => 'required|string',
                'anonymous_sender' => 'required|string',
                'redeemed_on' => 'required|string',
                'status' => 'required|string',
                'name' => 'required|string',
                'name_ar' => 'required|string',
                'message' => 'required|string',
                'share_url' => 'required|string',
                'name_tr' => 'required|string',
                'image_url_tr' => 'required|image|mimes:png,jpg|max:10048',
            ];

        }

        return $myRules;
    }
}
