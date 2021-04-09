<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Imagengaleri;
use App\Producto;
use App\Productocategoria;
use App\Tienda;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole('Admin')) {
            $productos = Producto::with('tienda','categoria')->get();
        }else{
            $tienda = Auth::user()->mitienda;
            // dd($demo);
            // $user = User::with('mitienda')->first();

            $productos = Producto::with('tienda','categoria')->where('tienda_id', $tienda->id)->get();
            // dd($productos);
        }
        return view('admin.mantenimiento.productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::user()->hasRole('Admin')) {
            $tiendas = Tienda::get();
            $categorias = Categoria::where('estado', 1)->get();
            return view('admin.mantenimiento.productos.crear', compact('tiendas','categorias'));
        }else{ //Tienda
            $tienda = Auth::user()->mitienda;
            $categorias = Categoria::where('estado', 1)->where('tienda_id', $tienda->id)->get();
            return view('admin.mantenimiento.productos.crear', compact('tienda','categorias'));
            
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->categorias);
        $pt = '';
        if (Auth::user()->hasRole('Admin')) {
            $buscarprod = Producto::where('tienda_id', $request->tienda_id)
            ->where('producto', $request->producto)
            ->where('categoria_id', $request->categoria_id)
            ->first();
            $pt = $request->tienda_id;
        }else{
            $tienda = Auth::user()->mitienda;
            $buscarprod = Producto::where('tienda_id', $tienda->id)
            ->where('producto', $request->producto)
            ->where('categoria_id', $request->categoria_id)
            ->first();
            $pt = $tienda->id;
        }
        if ($buscarprod) {
            $validatedData = $request->validate([
                'producto' => 'required|string|unique:productos',
            ]);
        }

        try {
            DB::beginTransaction();
            $producto = new Producto();
            // if (Auth::user()->hasRole('Admin')) {
            //     $producto->tienda_id = $request->tienda_id;
            // }else{
            //     $tienda = Auth::user()->mitienda;
            //     $producto->tienda_id = $tienda->id;
            // }
            // $password = bcrypt('secret');
            $producto->tienda_id = $pt;
            $producto->producto = Str::ucfirst(strtolower($request->producto));
            $producto->slug = Str::slug($request->producto.'-'.time(), '-');
            $producto->precio = $request->precio;
            $producto->oferta = $request->oferta;
            $producto->ingredientes = $request->ingredientes;
            $producto->contenido = $request->contenido;
            // $producto->categorias = $request->categorias;
            $producto->categoria_id = $request->categoria_id;
            $producto->destacado = $request->destacado;
            $producto->estado = $request->estado;
            $producto->save();

            if ($request->hasFile('portada')) {
                $portada = 'productos/'.time().'-'.$producto->slug.".webp";
                $img = \Image::make($request->portada)->resize(null, 450, function ($constraint) {
                                            $constraint->aspectRatio();
                                        })->save($portada);
                $producto->portada = $portada;
                $producto->save();
            }
            if ($request->portada_url) {
                $request->portada_url = str_replace(".webp", ".jpg", $request->portada_url);
                $portada = 'productos/'.time().'-'.$producto->slug.".jpg";
                $img = \Image::make($request->portada_url)->resize(null, 450, function ($constraint) {
                                            $constraint->aspectRatio();
                                        })->save($portada);
                $producto->portada = $portada;
                $producto->save();
            }
            
            // foreach ($request->categorias as $key => $value) {
            //     $prodcat = new Productocategoria();
            //     $prodcat->categoria_id=$value;
            //     $prodcat->producto_id=$producto->id;
            //     $prodcat->save();
            // }
            //Registrar galeria de imagenes
            $imagal = new Imagengaleri();
            $imagal->tp_id = $producto->id;
            $imagal->tipo = 'P';
            if ($request->hasFile('gal1')) {
                $name1 = 'galeriaimage/'.time().'-1'.$producto->slug.".jpg";
                $img = \Image::make($request->gal1)->resize(null, 450, function ($constraint) {
                                            $constraint->aspectRatio();
                                        })->save($name1);
                $imagal->imagen_pri = $name1;
            }if($request->gal1_url){
                $request->gal1_url = str_replace(".webp", ".jpg", $request->gal1_url);
                $name1 = 'galeriaimage/'.time().'-1'.$producto->slug.".jpg";
                $img = \Image::make($request->gal1_url)->resize(null, 450, function ($constraint) {
                                            $constraint->aspectRatio();
                                        })->save($name1);
                $imagal->imagen_pri = $name1;
            }

            if ($request->hasFile('gal2')) {
                $name2 = 'galeriaimage/'.time().'-2'.$producto->slug.".jpg";
                $img = \Image::make($request->gal2)->resize(null, 450, function ($constraint) {
                                            $constraint->aspectRatio();
                                        })->save($name2);
                $imagal->imagen_seg = $name2;
            }if($request->gal2_url){
                $request->gal2_url = str_replace(".webp", ".jpg", $request->gal2_url);
                $name2 = 'galeriaimage/'.time().'-2'.$producto->slug.".jpg";
                $img = \Image::make($request->gal2_url)->resize(null, 450, function ($constraint) {
                                            $constraint->aspectRatio();
                                        })->save($name2);
                $imagal->imagen_seg = $name2;
            }

            if ($request->hasFile('gal3')) {
                $name3 = 'galeriaimage/'.time().'-3'.$producto->slug.".jpg";
                $img = \Image::make($request->gal3)->resize(null, 450, function ($constraint) {
                                            $constraint->aspectRatio();
                                        })->save($name3);
                $imagal->imagen_ter = $name3;
            }if($request->gal3_url){
                $request->gal3_url = str_replace(".webp", ".jpg", $request->gal3_url);
                $name3 = 'galeriaimage/'.time().'-3'.$producto->slug.".jpg";
                $img = \Image::make($request->gal3_url)->resize(null, 450, function ($constraint) {
                                            $constraint->aspectRatio();
                                        })->save($name3);
                $imagal->imagen_ter = $name3;
            }
            $imagal->estado = 1;
            $imagal->save();

            DB::commit();
            // return redirect()->route('products.index')
            //     ->with('info', 'El registro se guardo con éxito');           
            return response()->json([
                'ok' => 'Se registró con éxito'
            ]);

        } catch (Exception $e) {
            DB::rollback();
            throw $e;

            // return redirect()->route('products.index')
            //     ->with('info', 'No se pudo hacer la operación.');

            return response()->json([
                'error' => 'algo salío mal'
            ]);
        }
    }

    
    public function show(Producto $producto)
    {
        //
    }

    public function edit($id)
    {
        $producto = Producto::where('slug', $id)->with('tienda')->firstorfail();
        if (!Auth::user()->hasRole('Admin')) {
            if (Auth::user()->mitienda->id != $producto->tienda->id) {
                return redirect()->route('products.index');
            }
        }
        // $tiendas = Tienda::get();
        // $tienda = Auth::user()->mitienda;
        $categorias = Categoria::where('estado', 1)->where('tienda_id', $producto->tienda->id)->get();
        // $categorias = Categoria::where('estado', 1)->get();
        $producto = Producto::where('slug', $id)->with('tienda')->firstorfail();
        $prodcat = Productocategoria::where('producto_id', $producto->id)->get();
        $galeriimagen = Imagengaleri::where('tp_id', $producto->id)->where('tipo','P')->first();
        return view('admin.mantenimiento.productos.edit', compact('categorias','producto','prodcat','galeriimagen'));
    }

    public function update(Request $request, $id)
    {
        // dd($id);
        $validatedData = $request->validate([
            'portada' => 'image|mimes:jpeg,png,jpg|max:2800',
            'gal1' => 'image|mimes:jpeg,png,jpg|max:2800',
            'gal2' => 'image|mimes:jpeg,png,jpg|max:2800',
            'gal3' => 'image|mimes:jpeg,png,jpg|max:2800',
        ]);

        try {
            DB::beginTransaction();
            $producto = Producto::where('slug', $id)->firstorfail();
            
            if ($request->has('producto') && $producto->producto != $request->producto) {

                $buscarprod = Producto::where('tienda_id', $producto->tienda_id)->where('producto', $request->producto)->first();
                if ($buscarprod) {
                    return redirect()->back()
                    ->with('info', 'Ya existe un Menú con este nombre');
                }
                
                $producto->producto = Str::ucfirst(strtolower($request->producto));
                $producto->slug = Str::slug($request->producto.'-'.time(), '-');
            }
            $producto->precio = $request->precio;
            $producto->oferta = $request->oferta;
            $producto->ingredientes = $request->ingredientes;
            $producto->contenido = $request->contenido;
            // $producto->categorias = $request->categorias;
            $producto->categoria_id = $request->categoria_id;
            $producto->destacado = $request->destacado;
            $producto->estado = $request->estado;
            $producto->save();

            if ($request->hasFile('portada')) {
                try{unlink(public_path($producto->portada));}
                catch(\Exception $e){ }
                $portada = 'productos/'.time().'-'.$producto->slug.".jpg";
                $img = \Image::make($request->portada)->resize(null, 450, function ($constraint) {
                                            $constraint->aspectRatio();
                                        })->save($portada);
                $producto->portada = $portada;
                $producto->save();
            }
            if ($request->portada_url) {
                $request->portada_url = str_replace(".webp", ".jpg", $request->portada_url);
                try{unlink(public_path($producto->portada));}
                catch(\Exception $e){ }
                $portada = 'productos/'.time().'-'.$producto->slug.".jpg";
                $img = \Image::make($request->portada_url)->resize(null, 450, function ($constraint) {
                                            $constraint->aspectRatio();
                                        })->save($portada);
                // $img->resize(null, 700); fit(700, 600)
                
                $producto->portada = $portada;
                $producto->save();
            }
            

            // $cate = Productocategoria::where('producto_id', $producto->id)->delete();

            // foreach ($request->categorias as $key => $value) {
            //     $prodcat = new Productocategoria();
            //     $prodcat->categoria_id=$value;
            //     $prodcat->producto_id=$producto->id;
            //     $prodcat->save();
            // }

            //Registrar galeria de imagenes
            $imagal = Imagengaleri::where('tp_id', $producto->id)->where('tipo','P')->first();
            // $imagal->tp_id = $producto->id;
            // $imagal->tipo = 'P';
            if ($imagal) {
                if ($request->hasFile('gal1')) {
                    try{unlink(public_path($imagal->imagen_pri));}
                    catch(\Exception $e){ }
                    $name1 = 'galeriaimage/'.time().'-1'.$producto->slug.".jpg";
                    $img = \Image::make($request->gal1)->resize(null, 450, function ($constraint) {
                                            $constraint->aspectRatio();
                                        })->save($name1);
                    $imagal->imagen_pri = $name1;
                }if($request->gal1_url){
                    $request->gal1_url = str_replace(".webp", ".jpg", $request->gal1_url);
                    try{unlink(public_path($imagal->imagen_pri));}
                    catch(\Exception $e){ }
                    $name1 = 'galeriaimage/'.time().'-1'.$producto->slug.".jpg";
                    $img = \Image::make($request->gal1_url)->resize(null, 450, function ($constraint) {
                                            $constraint->aspectRatio();
                                        })->save($name1);
                    $imagal->imagen_pri = $name1;
                }
    
                if ($request->hasFile('gal2')) {
                    try{unlink(public_path($imagal->imagen_seg));}
                    catch(\Exception $e){ }
                    $name2 = 'galeriaimage/'.time().'-2'.$producto->slug.".jpg";
                    $img = \Image::make($request->gal2)->resize(null, 450, function ($constraint) {
                                            $constraint->aspectRatio();
                                        })->save($name2);
                    $imagal->imagen_seg = $name2;
                }if($request->gal2_url){
                    $request->gal2_url = str_replace(".webp", ".jpg", $request->gal2_url);
                    try{unlink(public_path($imagal->imagen_seg));}
                    catch(\Exception $e){ }
                    $name2 = 'galeriaimage/'.time().'-2'.$producto->slug.".jpg";
                    $img = \Image::make($request->gal2_url)->resize(null, 450, function ($constraint) {
                                            $constraint->aspectRatio();
                                        })->save($name2);
                    $imagal->imagen_seg = $name2;
                }
    
                if ($request->hasFile('gal3')) {
                    try{unlink(public_path($imagal->imagen_ter));}
                    catch(\Exception $e){ }
                    $name3 = 'galeriaimage/'.time().'-3'.$producto->slug.".jpg";
                    $img = \Image::make($request->gal3)->resize(null, 450, function ($constraint) {
                                            $constraint->aspectRatio();
                                        })->save($name3);
                    $imagal->imagen_ter = $name3;
                }if($request->gal3_url){
                    $request->gal3_url = str_replace(".webp", ".jpg", $request->gal3_url);
                    try{unlink(public_path($imagal->imagen_ter));}
                    catch(\Exception $e){ }
                    $name3 = 'galeriaimage/'.time().'-3'.$producto->slug.".jpg";
                    $img = \Image::make($request->gal3_url)->resize(null, 450, function ($constraint) {
                                            $constraint->aspectRatio();
                                        })->save($name3);
                    $imagal->imagen_ter = $name3;
                }
                $imagal->save();
            }else{
                $imagal = new Imagengaleri();
                $imagal->tp_id = $producto->id;
                $imagal->tipo = 'P';
                if ($request->hasFile('gal1')) {
                    $name1 = 'galeriaimage/'.time().'-1'.$producto->slug.".jpg";
                    $img = \Image::make($request->gal1)->resize(null, 450, function ($constraint) {
                                            $constraint->aspectRatio();
                                        })->save($name1);
                    $imagal->imagen_pri = $name1;
                }if($request->gal1_url){
                    $request->gal1_url = str_replace(".webp", ".jpg", $request->gal1_url);
                    $name1 = 'galeriaimage/'.time().'-1'.$producto->slug.".jpg";
                    $img = \Image::make($request->gal1_url)->resize(null, 450, function ($constraint) {
                                            $constraint->aspectRatio();
                                        })->save($name1);
                    $imagal->imagen_pri = $name1;
                }
    
                if ($request->hasFile('gal2')) {
                    $name2 = 'galeriaimage/'.time().'-2'.$producto->slug.".jpg";
                    $img = \Image::make($request->gal2)->resize(null, 450, function ($constraint) {
                                            $constraint->aspectRatio();
                                        })->save($name2);
                    $imagal->imagen_seg = $name2;
                }if($request->gal2_url){
                    $request->gal2_url = str_replace(".webp", ".jpg", $request->gal2_url);
                    $name2 = 'galeriaimage/'.time().'-2'.$producto->slug.".jpg";
                    $img = \Image::make($request->gal2_url)->resize(null, 450, function ($constraint) {
                                            $constraint->aspectRatio();
                                        })->save($name2);
                    $imagal->imagen_seg = $name2;
                }
    
                if ($request->hasFile('gal3')) {
                    $name3 = 'galeriaimage/'.time().'-3'.$producto->slug.".jpg";
                    $img = \Image::make($request->gal3)->resize(null, 450, function ($constraint) {
                                            $constraint->aspectRatio();
                                        })->save($name3);
                    $imagal->imagen_ter = $name3;
                }if($request->gal3_url){
                    $request->gal3_url = str_replace(".webp", ".jpg", $request->gal3_url);
                    $name3 = 'galeriaimage/'.time().'-3'.$producto->slug.".jpg";
                    $img = \Image::make($request->gal3_url)->resize(null, 450, function ($constraint) {
                                            $constraint->aspectRatio();
                                        })->save($name3);
                    $imagal->imagen_ter = $name3;
                }
                $imagal->estado = 1;
                $imagal->save();
            }

            DB::commit();
            // return redirect()->route('products.index')
            //     ->with('info', 'El registro se guardo con éxito');           
            return response()->json([
                'ok' => 'Se actualizó con éxito'
            ]);

        } catch (Exception $e) {
            DB::rollback();
            throw $e;

            // return redirect()->route('products.index')
            //     ->with('info', 'No se pudo hacer la operación.');
            return response()->json([
                'error' => 'algo salío mal'
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Producto  $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $producto = Producto::where('id', $id)->with('tienda')->firstorfail();
        if (!Auth::user()->hasRole('Admin')) {
            if (Auth::user()->mitienda->id != $producto->tienda->id) {
                return redirect()->route('products.index');
            }
        }

        $producto = Producto::findOrfail($id);
        $producto->delete();
        return redirect()->route('products.index');
    }
}
