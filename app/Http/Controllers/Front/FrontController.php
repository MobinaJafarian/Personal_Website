<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Home;
use App\Models\Skill;
use Illuminate\Http\Request;

class FrontController extends Controller
{

    public function index()
    {
        $home = Home::orderBy('id' , 'desc')->first();
        $about = About::orderBy('id' , 'desc')->first();
        $skills = Skill::orderBy('id', 'asc')->take(10)->get();
        // $blog = Blog::orderBy('id', 'desc')->take(3)->get();
        return view('front.index' , compact('home' , 'about' , 'skills'));
    }
}
