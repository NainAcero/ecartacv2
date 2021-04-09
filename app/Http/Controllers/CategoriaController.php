<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole('Admin')) {
            $categorias = Categoria::get();

            $cateorder = Categoria::get();
        }else{
            $tienda = Auth::user()->mitienda;
            $categorias = Categoria::where('tienda_id', $tienda->id)->get();

            $cateorder = Categoria::where('tienda_id', $tienda->id)
            ->orderBy('sort_id','asc')
            ->get();
        }
        return view('admin.mantenimiento.categorias.index', compact('categorias','cateorder'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mantenimiento.categorias.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tienda = Auth::user()->mitienda;

        $buscarcat = Categoria::where('tienda_id', $tienda->id)->where('categoria', $request->categoria)->first();
        if ($buscarcat) {
            $validatedData = $request->validate([
                'categoria' => 'required|string|unique:categorias',
            ]);
        }

        $categoria = new Categoria();
        $categoria->tienda_id = $tienda->id;
        $categoria->categoria = Str::ucfirst(strtolower($request->categoria));
        $categoria->slug = Str::slug($request->categoria, '-');
        $categoria->descripcion = $request->descripcion;
        $categoria->estado = $request->estado;
        $categoria->save();
        // return redirect('admin/rubros');
        return redirect()->route('categorias.index')
                ->with('info', 'El registro se guardo con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(Categoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = Categoria::where('id', $id)->firstorfail();
        return view('admin.mantenimiento.categorias.edit', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $categoria = Categoria::where('id', $id)->firstorfail();
        // dd($categoria);
        // $validatedData = $request->validate([
        //     'categoria' => 'required|string|unique:categorias, categoria,'.$categoria->id,
        // ]);
        $categoria->categoria = Str::ucfirst(strtolower($request->categoria));
        $categoria->slug = Str::slug($request->categoria, '-');
        $categoria->descripcion = $request->descripcion;
        $categoria->estado = $request->estado;
        $categoria->save();
        // return redirect('admin/rubros');
        return redirect()->route('categorias.index')
                ->with('info', 'El registro se guardo con éxito');
    }

    public function updateOrder(Request $request)
    {
        if($request->has('ids')){
            $arr = explode(',',$request->input('ids'));

            foreach($arr as $sortOrder => $id){
                $categoria = Categoria::find($id);
                $categoria->sort_id = $sortOrder;
                $categoria->save();
            }
            return ['success'=>true,'message'=>'Updated'];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categoria $categoria)
    {
        //
    }
}
