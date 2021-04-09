<?php

namespace App\Http\Controllers;

use App\Carta;
use App\Pedido;
use App\Tienda;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function enviar(Request $request) {

        $validator = Validator::make($request->all(), [
            'nombre' => 'required|string|max:118',
            'telefono' => 'required|string|max:28',
            'direccion' => 'required|string|max:190'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 404);
        }

        try {

            DB::beginTransaction();

            $pedido = Pedido::create([
                "tienda_id" => $request->tienda_id,
                "nombre" => $request->nombre,
                "telefono" => $request->telefono,
                "direccion" => $request->direccion
            ]);

            foreach($request->productos as $p) {
                Carta::create([
                    "pedido_id" => $pedido->id,
                    "cantidad" => (int) $p['xcantidad'],
                    "precio" => 0,
                    "producto_id" => (int) $p['xid'],
                ]);
            }
            DB::commit();

            event(new \App\Events\PedidoEvent([
                "id" => $pedido->id,
                "tienda_id" => $request->tienda_id,
                "nombre" => $request->nombre,
                "telefono" => $request->telefono,
                "direccion" => $request->direccion,
            ]));

            $mensaje = "Pedido enviado con éxito....";
            return response()->json(compact('mensaje'),201);

        } catch (Exception $e) {
            DB::rollback();
            throw $e;

            $mensaje = "Ocurrio un error....";
            return response()->json(compact('mensaje'),400);
        }
    }

    public function pedidos() {
        return view('admin.delivery.pedidos');
    }

    public function get_pedidos() {
        $fi = Carbon::parse(Carbon::now())->format('Y-m-d').' 00:00:00';
        $ff = Carbon::parse(Carbon::now())->format('Y-m-d').' 23:59:59';

        $pedidos = Pedido::whereBetween('created_at',[$fi , $ff ])
            ->select("id", "tienda_id", "nombre", "telefono", "direccion")
            ->orderBy("id", "DESC")
            ->where("estado", "=", 1)
            ->get();

        return response()->json(compact('pedidos'),200);
    }

    public function get_restaurante(Request $request) {
        $restaurante = Tienda::where('id', $request->id)->first();
        return response()->json(compact('restaurante'),200);
    }

    public function get_productos(Request $request) {
        $productos = Carta::join('productos', 'cartas.producto_id', '=', 'productos.id')
                        ->where('cartas.pedido_id', "=", $request->id)
                        ->get();

        return response()->json(compact('productos'),200);
    }

    public function enviar_delivery(Request $request) {
        $pedido = Pedido::where('id', '=', $request->id)->first();

        $pedido->estado = 2;
        $pedido->save();
    }
}
