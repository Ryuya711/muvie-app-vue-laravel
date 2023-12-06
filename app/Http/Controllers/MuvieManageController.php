<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MuvieManageController extends Controller
{
    public function index() {
        return view('muvie.index');
    }    
}
