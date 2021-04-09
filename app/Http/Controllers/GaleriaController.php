<?php

namespace App\Http\Controllers;

use App\Galeria;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class GaleriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galerias = Galeria::get();
        return view('admin.mantenimiento.galerias.index', compact('galerias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mantenimiento.galerias.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'galeria' => 'string|unique:galerias',
        ]);

        try {
            DB::beginTransaction();
            $galeria = new Galeria();
            $galeria->galeria = Str::title($request->galeria);
            $galeria->slug = Str::slug($request->galeria, '-');
            $galeria->direccion = $request->direccion;
            $galeria->celular = $request->celular;
            $galeria->mapa = $request->mapa;
            $galeria->estado = $request->estado;
            $galeria->save();
            
            DB::commit();
            return redirect()->route('galerias.index')
                ->with('info', 'El registro se guardo con éxito');           

        } catch (Exception $e) {
            DB::rollback();
            throw $e;

            return redirect()->route('galerias.index')
                ->with('info', 'No se pudo hacer la operación.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function show(Galeria $galeria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function edit(Galeria $galeria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Galeria $galeria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Galeria  $galeria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Galeria $galeria)
    {
        //
    }
}
