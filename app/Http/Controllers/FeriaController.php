<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FeriaController extends Controller
{
    public function index() {
        return view('frontend.feria.index');
    }

    public function isometrica() {
        return view('frontend.feria.isometrica');
    }

    public function stand() {
        return view('frontend.feria.stand');
    }
}
