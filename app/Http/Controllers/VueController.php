<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VueController extends Controller
{
    public function index(){
    	return view('main');
    }

     public function about(){
    	return view('about');
    }
}

