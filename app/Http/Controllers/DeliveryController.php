<?php

namespace App\Http\Controllers;

use App\Persona;
use App\User;
use Illuminate\Http\Request;
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
        $users = User::join('model_has_roles as mr', 'mr.model_id', 'users.id')
            ->where('mr.role_id', '=', 4)
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
