<?php

namespace App\Http\Controllers;

use App\Models\ccdCarShop;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CcdCarShopController extends Controller
{
    function index(){
        $ccd_car_shops = ccdCarShop::query()
            ->latest()
            ->get();
        return view('models.ccd_car_shops.index', [
            'ccd_car_shops' => $ccd_car_shops
        ]);
    }

    function create(){
        return view('models.ccd_car_shops.form');
    }

    function store(){
        $data = request()->validate($this->rules());

        $ccd_car_shop = ccdCarShop::query()
            ->create($data);

        return redirect()->route('ccd_car_shops.show',$ccd_car_shop);
    }

    function show(ccdCarShop $ccd_car_shop){
        return view('models.ccd_car_shops.show',[
            'ccd_car_shop' => $ccd_car_shop
        ]);
    }

    function edit(ccdCarShop $ccd_car_shop){
        return view('models.ccd_car_shops.form',[
            'ccd_car_shop' => $ccd_car_shop
        ]);
    }

    function update(ccdCarShop $ccd_car_shop){
        $data = request()->validate($this->rules($ccd_car_shop));

        $ccd_car_shop->update($data);
        return redirect()->route('ccd_car_shops.show',$ccd_car_shop);
    }

    function destroy(ccdCarShop $ccd_car_shop){
        $ccd_car_shop->delete();
        return redirect()->route('ccd_car_shops.index');
    }

    protected function rules(ccdCarShop $ccd_car_shop = null):array{
        $uniqueTitle = Rule::unique('ccd_car_shops','carName');

        if($ccd_car_shop)
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
