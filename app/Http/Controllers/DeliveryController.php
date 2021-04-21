<?php

namespace App\Http\Controllers;

use App\Delivery;
use App\Persona;
use App\RestDelivery;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = Delivery::join('personas', 'personas.id', 'deliveries.persona_id')
            ->join('users', 'users.id', 'personas.user_id')
            ->get();

        return view('admin.mantenimiento.delivery.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        return view('admin.mantenimiento.delivery.create',compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'nombres' => 'required|string|max:191',
            'username' => 'required|string|max:191|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'celular' => 'required|numeric'
        ]);

        try {
            DB::beginTransaction();

            $user = User::create([
                'name' => $request['nombres'].' '.$request['apellidos'],
                'username' => $request['username'],
                'password' => Hash::make($request['password'])
            ]);
            $user->syncRoles($request->get('roles'));

            $persona = new Persona();
            $persona->user_id = $user->id;
            $persona->nombres = $request->nombres;
            $persona->apellidos = "";
            $persona->celular = $request->celular;
            $persona->estado = 1;
            $persona->save();

            $delivery = new Delivery();
            $delivery->persona_id = $persona->id;
            $delivery->save();

            DB::commit();
            return redirect()->route('delivery.index')
                ->with('info', 'El registro se guardo con éxito');

        } catch (Exception $e) {
            DB::rollback();
            throw $e;

            return redirect()->route('delivery.index')
                ->with('info', 'No se pudo hacer la operación.');
        }
    }

    public function show_restaurante() {
        $deliveries = RestDelivery::where('tienda_id', '=', Auth::user()->mitienda->id)
                ->join('deliveries', 'deliveries.id', 'rest_deliveries.delivery_id')
                ->join('personas', 'deliveries.persona_id', 'personas.id')
                ->get();

        return view('admin.tienda.delivery-index',compact('deliveries'));
    }

    public function crear_restaurante() {
        $deliveries = Delivery::join('personas', 'personas.id', 'deliveries.persona_id')
            ->select("deliveries.id", "personas.nombres")
            ->get();

        return view('admin.tienda.delivery-create',compact('deliveries'));
    }

    public function restaurante_store(Request $request) {
        if(count($request->deliveries) > 0) {
            foreach($request->deliveries as $delivery) {
                $resDelivery = RestDelivery::create([
                    "delivery_id" => $delivery,
                    "tienda_id" => Auth::user()->mitienda->id
                ]);
            }
            return redirect()->route("restaurante.delivery-show");
        }else{
            return back();
        }
    }

    public function get_deliveries(Request $request) {
        $deliveries = RestDelivery::where('tienda_id', '=', $request->id)
            ->join('deliveries', 'deliveries.id', 'rest_deliveries.delivery_id')
            ->join('personas', 'deliveries.persona_id', 'personas.id')
            ->select('deliveries.id', 'personas.nombres')
            ->get();

        return response()->json(compact('deliveries'),200);
    }
}
