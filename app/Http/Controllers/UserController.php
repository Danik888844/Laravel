<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function show(User $user){
        $comments = $user->comments()
            ->with('ccd_car_shop') //N+1 problem solved
            ->latest()
            ->take(5)
            ->get();

        $ccd_car_shops = $user->ccdcarshops()
            ->latest()
            ->get();

        return view('models.users.show', [
            'user' => $user,
            'comments' => $comments,
            'ccd_car_shops' => $ccd_car_shops,
        ]);
    }
}
