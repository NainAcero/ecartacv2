<?php

namespace App\Http\Controllers;

use App\Tienda;
use Illuminate\Http\Request;

class FeriaController extends Controller
{
    public function index() {
        return view('frontend.feria.index');
    }

    public function isometrica() {
        $tiendas = Tienda::where('feria', '=', 1)->get();
        return view('frontend.feria.isometrica', compact('tiendas'));
    }

    public function stand() {
        return view('frontend.feria.stand');
    }
}
