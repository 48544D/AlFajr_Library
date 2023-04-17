<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MalisteController extends Controller
{
    public function index()
    {
        return view('maliste.index');
    }
}
