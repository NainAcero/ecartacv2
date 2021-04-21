<?php

namespace App\Http\Controllers;

use App\Carta;
use App\Delivery;
use App\Pedido;
use App\Tienda;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

            $tienda = Tienda::where('id', '=', $request->tienda_id)->first();

            $pedido = Pedido::create([
                "tienda_id" => $request->tienda_id,
                "nombre" => $request->nombre,
                "telefono" => $request->telefono,
                "direccion" => $request->direccion,
                "delivery_id" => ($request->estado == 0)? null : $request->estado,
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

            $nombres = "";
            $delivery = null;

            if($request->estado != 0) {
                event(new \App\Events\PedidoEvent([
                    "id" => $pedido->id,
                    "tienda_id" => $request->tienda_id,
                    "nombre" => $request->nombre,
                    "telefono" => $request->telefono,
                    "direccion" => $request->direccion,
                    "tienda" => $tienda->tienda,
                    "delivery_id" => $request->estado,
                    "aceptar" => 0,
                ]));

                $delivery = Delivery::join('personas', 'personas.id', 'deliveries.persona_id')
                    ->where('deliveries.id', '=', $request->estado)->first();
                $nombres = $delivery->nombres;
            }

            event(new \App\Events\RestauranteEvent([
                "id" => $pedido->id,
                "tienda_id" => $request->tienda_id,
                "nombre" => $request->nombre,
                "telefono" => $request->telefono,
                "direccion" => $request->direccion,
                "tienda" => $tienda->tienda,
                "delivery_id" => $request->estado,
                "nombres" => $nombres,
                "aceptar" => 0,
            ]));

            $mensaje = "Pedido enviado con éxito....";
            return response()->json(compact('mensaje', 'delivery'),201);

        } catch (Exception $e) {
            DB::rollback();
            throw $e;

            $mensaje = "Ocurrio un error....";
            return response()->json(compact('mensaje'),400);
        }
    }

    public function pedidos() {
        $user_id = Auth::user()->persona->id;
        $delivery = Delivery::where('persona_id', '=', $user_id)->first();

        return view('admin.delivery.pedidos', compact('delivery'));
    }

    public function get_pedidos() {
        $fi = Carbon::parse(Carbon::now())->format('Y-m-d').' 00:00:00';
        $ff = Carbon::parse(Carbon::now())->format('Y-m-d').' 23:59:59';

        $pedidos = Pedido::join('tiendas', 'pedidos.tienda_id', '=', 'tiendas.id')
            ->whereBetween('pedidos.created_at',[$fi , $ff ])
            ->select("pedidos.id", "pedidos.tienda_id", "pedidos.nombre", "pedidos.telefono",
                "pedidos.direccion", "pedidos.delivery_id", "tiendas.tienda", "aceptar")
            ->orderBy("pedidos.id", "DESC")
            ->where("pedidos.delivery_id", "<>", 0)
            ->get();

        return response()->json(compact('pedidos'),200);
    }

    public function get_restaurante(Request $request) {
        $restaurante = Tienda::where('id', $request->id)->first();
        return response()->json(compact('restaurante'),200);
    }

    public function get_productos(Request $request) {
        $productos = Carta::join('productos', 'cartas.producto_id', '=', 'productos.id')
                        ->join('tiendas', 'productos.tienda_id', '=', 'tiendas.id')
                        ->where('cartas.pedido_id', "=", $request->id)
                        ->get();
        return response()->json(compact('productos'),200);
    }

    public function enviar_delivery(Request $request) {
        $pedido = Pedido::where('id', '=', $request->id)->first();

        $pedido->aceptar = 1;
        event(new \App\Events\RestauranteNotification($request->id));
        $pedido->save();
    }

    // TIENDA PEDIDOS

    public function tienda() {
        return view('admin.tienda.pedidos');
    }

    public function get_pedidos_restaurante(Request $request) {

        $fi = Carbon::parse(Carbon::now())->format('Y-m-d').' 00:00:00';
        $ff = Carbon::parse(Carbon::now())->format('Y-m-d').' 23:59:59';

        $pedidos = Pedido::join('deliveries', 'deliveries.id', 'pedidos.delivery_id')
            ->join('personas', 'deliveries.persona_id', 'personas.id')
            ->whereBetween('pedidos.created_at',[$fi , $ff ])
            ->where('pedidos.tienda_id', "=", $request->id)
            ->select("pedidos.id", "pedidos.tienda_id", "pedidos.nombre", "pedidos.telefono", "pedidos.direccion", "pedidos.delivery_id", "aceptar", "nombres")
            ->orderBy("pedidos.id", "DESC")
            ->get();

        return response()->json(compact('pedidos'),200);
    }
}
