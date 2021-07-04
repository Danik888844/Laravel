<?php

namespace App\Http\Controllers;

use App\Http\Requests\CcdCarShopRequest;
use App\Models\ccdCarShop;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CcdCarShopController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(ccdCarShop::class,'post',[
            'except' => ['index','show']
        ]);
    }

    function index(){
        $ccd_car_shops = ccdCarShop::query()
            ->latest()
            ->with('user')
            ->get();
        return view('models.ccd_car_shops.index', [
            'ccd_car_shops' => $ccd_car_shops
        ]);
    }

    function create(){
        return view('models.ccd_car_shops.form');
    }

    function store(CcdCarShopRequest $request){
        $data = $request->validated();

        $post = auth()->user()
            ->ccdcarshops()
            ->create($data);

        return redirect()->route('ccd_car_shops.show',$post);
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

    function update(CcdCarShopRequest $request,ccdCarShop $ccd_car_shop){
        $data = $request->validated();

        $ccd_car_shop->update($data);
        return redirect()->route('ccd_car_shops.show',$ccd_car_shop);
    }

    function destroy(ccdCarShop $ccd_car_shop){
        $ccd_car_shop->delete();
        return redirect()->route('ccd_car_shops.index');
    }
}
