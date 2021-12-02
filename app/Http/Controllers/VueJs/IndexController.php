<?php

namespace App\Http\Controllers\VueJs;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return view('vueJs.index');
    }
}
