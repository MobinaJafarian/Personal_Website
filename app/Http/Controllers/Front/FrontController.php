<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Home;
use Illuminate\Http\Request;

class FrontController extends Controller
{

    public function index()
    {
        $home = Home::orderBy('id' , 'desc')->first();
        return view('front.index' , compact('home'));
    }
}
