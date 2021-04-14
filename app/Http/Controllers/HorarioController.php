<?php

namespace App\Http\Controllers;

use App\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    public function show($id) {
        $horarios = Horario::where('tienda_id', '=', $id)->get();
        $dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];

        return view('admin.tienda.show-horarios', compact('horarios','dias','id'));
    }

    public function store(Request $request) {

        if(count($request->dias) > 6 &&
            count($request->start_hours) > 6 && count($request->end_hours) > 6) {

            if($request->delete != null) {
                $horario = Horario::where('tienda_id', '=', $request->tienda_id)->delete();
            }

            for($i = 0; $i < 7; $i++) {
                $horario = new Horario();
                $horario->day = $request->dias[$i];
                $horario->tienda_id = $request->tienda_id;
                $horario->estatus = 0;
                $horario->start_time = $request->start_hours[$i];
                $horario->end_time = $request->end_hours[$i];
                $horario->save();
            }

            foreach($request->estados as $dia) {
                $horario = Horario::where('tienda_id', '=', $request->tienda_id)
                    ->where('day', '=', $dia)->first();

                $horario->estatus = 1;
                $horario->save();
            }

            return redirect()->back()->with('success', 'Se Actualizó el Horario.');
        }else{
            return redirect()->back()->with('error', 'No se pudo registrar.');
        }
    }

    public function get_horarios(Request $request) {
        $horarios = Horario::where('tienda_id', $request->tienda_id)->get();
        return response()->json(compact('horarios'),200);
    }
}
