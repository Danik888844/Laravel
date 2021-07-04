<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CcdCarShopRequest extends FormRequest
{
    public function rules(){
        $uniqueTitle = Rule::unique('ccd_car_shops','carName');

        if($ccd_car_shop = $this->route('ccd_car_shop'))
            $uniqueTitle->ignoreModel($ccd_car_shop);

        return [
            'carName' => [
                'required',
                'string',
                'max:255',
                $uniqueTitle
            ],
            'price' => [
                'required',
                'string',
                'max:255'
            ],
            'tax' => [
                'required',
                'string',
                'max:255'
            ],
            'maxSpeed' => [
                'required',
                'integer'
            ]
        ];
    }
}
