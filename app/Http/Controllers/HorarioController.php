<?php

namespace App\Http\Controllers;

use App\Horario;
use Illuminate\Http\Request;
use DB;

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
        $horarios = Horario::where('tienda_id', $request->tienda_id)
            ->select('*',
                DB::RAW("0 as checked"),
                DB::RAW("'' as inicio"),
                DB::RAW("'' as fin")
            )->get();

        for($i =0; $i < count($horarios); $i++){
            if(intval(substr($horarios[$i]->start_time, 0, 2)) >= 12 ) {
                $horarios[$i]->inicio = substr($horarios[$i]->start_time, 0, 5) . " pm";
            }else {
                $horarios[$i]->inicio = substr($horarios[$i]->start_time, 0, 5) . " am";
            }

            if(intval(substr($horarios[$i]->end_time, 0, 2)) >= 12 ) {
                $horarios[$i]->fin = substr($horarios[$i]->end_time, 0, 5) . " pm";
            }else {
                $horarios[$i]->fin = substr($horarios[$i]->end_time, 0, 5) . " am";
            }
        }
        $dia= date("w");
        return response()->json(compact('horarios', 'dia'),200);
    }
}
