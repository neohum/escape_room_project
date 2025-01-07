<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontShowController extends Controller
{
    public function index(){
        return view('front_show.index');
    }
}
