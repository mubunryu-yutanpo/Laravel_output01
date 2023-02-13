<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ModeSelectController extends Controller
{
    public function mode(){
        return view('mode_select');
    }
}
