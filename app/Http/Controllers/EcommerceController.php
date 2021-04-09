<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Galeria;
use App\Imagengaleri;
use App\Producto;
use App\Productocategoria;
use App\Tienda;
use Illuminate\Http\Request;

class EcommerceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::where('estado', 1)->orderBy('categoria')->get();
        $productos = Producto::with('tienda')->where('estado', 1)->inRandomOrder('1234')->paginate(12);
        // $tiendas = Tienda::where('estado', 1)->orderby('id', 'desc')->paginate(8, ['*'], 'restaurantes');
        $tiendas = Tienda::where('estado', 1)->orderby('id', 'desc')->get();
        // $galerias = Galeria::where('estado', 1)->take(8)->get();
        // dd($productos   );
        // dd($productos);
        return view('index', compact('productos','categorias','tiendas'));
    }
    public function listarPorCategoria($slug)
    {
        // dd($slug);
        $categorias = Categoria::where('estado', 1)->orderBy('categoria')->get();
        $cate = Categoria::where('slug', $slug)->firstorfail();
        // $prodcat = Productocategoria::where('categoria_id', $cate->id)->pluck('producto_id');
        $productos = Producto::where('categoria_id',$cate->id)->where('estado', 1)->paginate(18);

        $tiendas = '';
        $galerias = '';
        return view('index', compact('productos','categorias','tiendas','galerias'));
    }
    public function buscarProducto(Request $request)
    {
        // dd($request->all());
        if ($request->tipo == 'P') {
            $categorias = Categoria::where('estado', 1)->orderBy('categoria')->get();

            // $productos = Producto::where('producto','LIKE', "%$request->data%")->where('estado', 1)->paginate(18);

            $productos = \App\Producto::search($request->data)->paginate(18);

            $tiendas = '';
            $galerias = '';
            return view('frontend.filtrados.productos', compact('productos','categorias','tiendas','galerias'));
        }else if ($request->tipo == 'T') {
            // $categorias = Categoria::where('estado', 1)->orderBy('categoria')->get();
            // $productos = Producto::where('producto','LIKE', "%$request->data%")->where('estado', 1)->paginate(18);
            // $tiendas = '';
            // $galerias = '';
            // return view('index', compact('productos','categorias','tiendas','galerias'));

            $categorias = Categoria::where('estado', 1)->orderBy('categoria')->get();
            $tiendas = Tienda::where('tienda','LIKE', "%$request->data%")->where('estado', 1)->get();
            // dd($galerias);
            return view('frontend.filtrados.tiendas', compact('tiendas','categorias'));
        }else if($request->tipo == 'O'){
            $categorias = Categoria::where('estado', 1)->orderBy('categoria')->get();

            $productos = Producto::where('producto','LIKE', "%$request->data%")
            ->where('oferta', 1)
            ->where('estado', 1)
            ->paginate(18);

            // $productos = \App\Producto::search($request->data)->paginate(18);

            $tiendas = '';
            $galerias = '';
            return view('frontend.filtrados.productos', compact('productos','categorias','tiendas','galerias'));

        }
    }

    public function verProducto($id)
    {
        $categorias = Categoria::where('estado', 1)->orderBy('categoria')->get();
        $producto = Producto::with('tienda','categoria')->where('slug', $id)
        ->where('estado', 1)
        ->first();
        $galeriimagen = Imagengaleri::where('tp_id', $producto->id)
        ->where('tipo','P')
        ->first();
        return view('frontend.detalleproducto', compact('producto','galeriimagen','categorias'));
    }

    public function listarGalerias()
    {
        $categorias = Categoria::where('estado', 1)->orderBy('categoria')->get();
        $galerias = Galeria::where('estado', 1)->get();
        // dd($galerias);
        return view('frontend.filtrados.galerias', compact('galerias','categorias'));
    }
    public function listarTiendas()
    {
        $categorias = Categoria::where('estado', 1)->orderBy('categoria')->get();
        $tiendas = Tienda::where('estado', 1)->orderBy('id', 'desc')->get();
        // dd($galerias);
        return view('frontend.filtrados.tiendas', compact('tiendas','categorias'));
    }
    public function listarTiendaProducto($slug)
    {
        $tienda = Tienda::where('slug', $slug)
        // ->with('categorias.productos')
        ->with(array('categorias'=>function ($query){
            $query->where('estado', 1);
            $query->with(array('productos'=>function ($query){
                $query->where('estado', 1);
            }));
        }))
        ->firstorfail();

        $categorias = Categoria::where('estado', 1)->orderBy('categoria')->get();
        // dd($tienda);
        // $prodcat = Productocategoria::where('categoria_id', $cate->id)->pluck('producto_id');
        $galeriimagen = Imagengaleri::where('tp_id', $tienda->id)
        ->where('tipo','T')
        ->first();
        $productos = Producto::where('tienda_id',$tienda->id)->where('estado', 1)->get();

        return view('frontend.filtrados.productotienda', compact('categorias','tienda','productos','galeriimagen'));
    }
    public function listarCategProducto_rest($id)
    {
        $categprod = Categoria::where('tienda_id', $id)
        ->with(array('productos'=>function ($query){
            $query->select('id','slug','portada','producto','ingredientes','precio','categoria_id','oferta');
            $query->where('estado', 1);
        }))
        ->select('id','categoria')
        ->orderBy('sort_id','asc')
        ->where('estado', 1)
        ->get();
        return compact('categprod');
    }
    public function getCategoria_rest(Request $request)
    {
        if ($request->category == '0') {
            $categoria = Categoria::where('tienda_id', $request->key)
            ->select('id','categoria')
            ->where('estado', 1)
            ->with(array('productos'=>function ($query){
                $query->select('id','slug','portada','producto','ingredientes','precio','categoria_id');
                $query->where('estado', 1);
            }))
            ->orderBy('sort_id','asc')
            ->get();
        }else{
            $categoria = Categoria::where('id', $request->category)
            ->select('id','categoria')
            ->where('tienda_id', $request->key)
            ->where('estado', 1)
            ->with(array('productos'=>function ($query){
                $query->select('id','slug','portada','producto','ingredientes','precio','categoria_id');
                $query->where('estado', 1);
            }))
            ->get();
        }
        return compact('categoria');
    }

    public function getBuscador_rest(Request $request) {
        $buscar = $request->buscar;

        if ($request->category == '0') {
            $categoria = Categoria::where('tienda_id', $request->key)
            ->select('id','categoria')
            ->where('estado', 1)
            ->with(array('productos'=>function ($query) use ($buscar){
                $query->select('id','slug','portada','producto','ingredientes','precio','categoria_id');
                $query->where('ingredientes', 'like', '%'.$buscar.'%');
                $query->orWhere('ingredientes', 'like', '%'.$buscar.'%');
                $query->where('estado', 1);
            }))
            ->get();
        }else{
            $categoria = Categoria::where('id', $request->category)
            ->select('id','categoria')
            ->where('tienda_id', $request->key)
            ->where('estado', 1)
            ->with(array('productos'=>function ($query) use ($buscar){
                $query->select('id','slug','portada','producto','ingredientes','precio','categoria_id');
                $query->where('ingredientes', 'like', '%'.$buscar.'%');
                $query->orWhere('ingredientes', 'like', '%'.$buscar.'%');
                $query->where('estado', 1);
            }))
            ->get();
        }
        return compact('categoria');
    }

    public function filtrarTiendas($slug)
    {
        $cc = Galeria::where('slug', $slug)->firstorfail();
        $categorias = Categoria::where('estado', 1)->orderBy('categoria')->get();
        $tiendas = Tienda::where('galeria_id', $cc->id)->where('estado', 1)->get();
        return view('frontend.filtrados.tiendas', compact('tiendas','categorias'));
    }

    public function lectorqr($qr)
    {
        $tiendas = Tienda::where('codigoqr',$qr)->where('estado', 1)->firstorfail();
        return redirect('r/'.$tiendas->slug);
    }
}
