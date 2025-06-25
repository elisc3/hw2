<?php

namespace app\Http\Controllers;  

use App\Http\Controllers\Controller; 
// use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        session(['page' => 'home']); 
        return view('home'); 
    }

}
