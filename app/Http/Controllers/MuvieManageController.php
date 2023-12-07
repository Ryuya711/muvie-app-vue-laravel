<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class movieManageController extends Controller
{
    public function index() {
        return view('movie.index');
    }    
}
