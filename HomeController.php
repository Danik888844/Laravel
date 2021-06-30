<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function index(){
        if(!session()->has('name'))
            return redirect()->route('form');

        return view('index',[
            'name' => session('name')
        ]);
    }

    function form(){
        if(session()->has('name'))
            return redirect()->route('index');

        return view('form');
    }

    function handle(){
        request()->validate([
            'name' => 'required'
        ]);

        session()->put('name', request('name'));
        return redirect()->route('index');
    }
}
