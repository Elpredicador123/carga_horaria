<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cargalectiva;
use App\Seccion;
use App\Aula;
use App\Ciclo;
use App\Curso;
use App\Escuela;
use App\Detallecargalectiva;
use App\Detallecargahoraria;
use App\Declaracionjurada;
use App\Carga;
use App\Cargahoraria;
use App\Detallecarga;
use Auth;
use Carbon\Carbon;
class CargalectivaController extends Controller
{
    public function index()
    {
        $items = Cargalectiva::paginate();
        return view("jefedepartamento.cargalectiva.index",compact('items'));
    }

    public function create($id)
    {
        $item = Cargalectiva::find($id);
        $secciones = Seccion::all();
        $ciclos = Ciclo::all();
        $cursos = Curso::all();
        $escuelas = Escuela::all();
        $cargas = Carga::all();
        return view("jefedepartamento.cargalectiva.create",compact('item','secciones','ciclos','cursos','escuelas','cargas'));
    }

    public function store(Request $request)
    {
        Detallecargalectiva::create($request->all());
       return redirect()->back()->with('datos','Curso registrado correctamente a la carga horaria');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $item=Cargalectiva::find($id);
        $periodos = Periodo::all();
        return view("jefedepartamento.declaracionjurada.edit",compact('item','periodos'));
    }

    public function update(Request $request, $id)
    {
        $n_detallecargalectiva = count($request->detallecargalectivas_id);
        $n_detallecarga = count($request->detallecargas_id);

       for ($i=0; $i <$n_detallecargalectiva ; $i++) { 
        Detallecargalectiva::find($request->detallecargalectivas_id[$i])->update([
            
                "numero_alumnos" => $request->numero_alumnos[$i],
                "horas_teoria" => $request->horas_teoria[$i],
                "grupos_teoria" => $request->grupos_teoria[$i],
                "horas_practica" => $request->horas_practica[$i],
                "grupos_practica" => $request->grupos_practica[$i],
                "horas_laboratorio" => $request->horas_laboratorio[$i],
                "grupos_laboratorio" => $request->grupos_laboratorio[$i],
           
        ]);
       }
       for ($i=0; $i <$n_detallecarga ; $i++) { 
        Detallecarga::find($request->detallecargas_id[$i])->update([
            
                "descripcion" => $request->descripcion[$i],
                "cantidad_horas" => $request->cantidad_horas[$i],
            
        ]);
       }

       return redirect()->back()->with('datos','Carga Lectiva actualizada correctamente');
    }

    public function destroy($id)
    {
        Detallecargalectiva::find($id)->delete();
        return redirect()->back()->with('datos','Curso eliminado correctamente de la carga horaria');
    }

    public function updatecargalectivaasignacion($id)
    {
        Cargalectiva::find($id)->update(["estado_asignado" => 1,]);
        return redirect()->back()->with('datos','Carga Lectiva actualizada correctamente');
    }

    public function updatecargalectivaterminado($id)
    {
        Cargalectiva::find($id)->update(["estado_terminado" => 1,]);
        Cargahoraria::insert([["cargalectiva_id" => $id,],]);
        return redirect()->back()->with('datos','Carga Lectiva actualizada correctamente');
    }
    public function updatedetallecargahorariaterminado($id)
    {
        Cargahoraria::find($id)->update(["estado_terminado" => 1,]);
        return redirect()->back()->with('datos','Horario semanal actualizada correctamente');
    }

    public function storedetallecarga(Request $request)
    {
        foreach ($request->cargas_id as $key => $value) {
            Detallecarga::insert([
                [
                    "cargalectiva_id" => $request->cargalectiva_id,
                    "carga_id" => $value,
                ],
            ]);
        }
       return redirect()->back()->with('datos','Cargas registradas correctamente a la carga horaria');
    }

    public function storedetallecargahoraria(Request $request,$id)
    {
        // dd($request->all());
        if ($request->detallecargalectiva_id) {
            # code...
            Detallecargahoraria::insert([
                [
                    "detallecargalectiva_id" => $request->detallecargalectiva_id,
                    "cargahoraria_id" => $id,
                    "dia" =>$request->dia,
                    "hora_inicio" =>$request->hora_inicio,
                    "hora_fin" =>$request->hora_fin,
                    "aula_id" =>$request->aula_id,
                    "tipo" =>$request->tipo,
                ],
            ]);
        }
        if ($request->detallecarga_id) {
            # code...
            Detallecargahoraria::insert([
                [
                    "detallecarga_id" => $request->detallecarga_id,
                    "cargahoraria_id" => $id,
                    "dia" =>$request->dia,
                    "hora_inicio" =>$request->hora_inicio,
                    "hora_fin" =>$request->hora_fin,
                    "aula_id" =>$request->aula_id,
                    "tipo" =>$request->tipo,
                ],
            ]);
        }
       return redirect()->back()->with('datos','Registro Horario semanala guardado correctamente');
    }


    public function destroydetallecarga($id)
    {
        Detallecarga::find($id)->delete();
        return redirect()->back()->with('datos','Carga eliminado correctamente de la carga horaria');
    }
    public function destroydetallecargahoraria($id)
    {
        Detallecargahoraria::find($id)->delete();
        return redirect()->back()->with('datos','Horario semanal eliminado correctamente');
    }

    public function horas_detallecarga($id,$tipo)
    {
        
        if ($tipo=="detallecargalectiva") {
            $detalle = Detallecargalectiva::find($id);
        }
        if ($tipo=="detallecarga") {
            $detalle = Detallecarga::find($id);
        }
        return $detalle;
    }
    public function horas_completas($id,$cantidad,$tipo,$detalle_id,$tipo_hora)
    {
        if ($tipo=="detallecargalectiva") {
            $detalle = Detallecargahoraria::where('cargahoraria_id',$id)
            ->where('detallecargalectiva_id',$detalle_id)
            ->where('tipo',$tipo_hora)
            ->get();
        }
        if ($tipo=="detallecarga") {
            $detalle = Detallecargahoraria::where('cargahoraria_id',$id)
            ->where('detallecarga_id',$detalle_id)
            ->where('tipo',$tipo_hora)
            ->get();
        }
        $sumatotal=0;
        if (count($detalle)>0) {
            foreach ($detalle as $key => $value) {
                $sumatotal+=($value->hora_fin-$value->hora_inicio);
            }
            if ($sumatotal<$cantidad) {
                return 1;
            }else {
                return 0;
            }
        }else {
            return 1;
        }
    }

    public function cargalectivaslistar()
    {
        $items = Declaracionjurada::where('docente_id',Auth::user()->docente->id)->where('estado','aprobado')->paginate();
        return view("docente.cargalectiva.index",compact('items'));
    }
    
    public function cargalectivasllenar($id)
    {
        $item = Cargalectiva::find($id);
        return view("docente.cargalectiva.create",compact('item'));
    }

    public function cargahoraria($id)
    {
        $item = Cargahoraria::find($id);
        $aulas = Aula::all();
        return view("docente.cargalectiva.horario",compact('item','aulas'));
    }

    public function imprimirCarga($id)
    {
        
        $item = Cargalectiva::find($id);
        $fecha = Carbon::now()->format('d-m-Y');
        $pdf = \PDF::loadView('pdf.cargahoraria', compact('item','fecha'));
        return $pdf->stream('CargaHoraria.pdf');
    } 

    public function imprimirHorario($id)
    {
        $item = Cargahoraria::find($id);
        $fecha = Carbon::now()->format('d-m-Y');
        $pdf = \PDF::loadView('pdf.horariosemanal', compact('item','fecha'))->setPaper('a4', 'landscape');
        return $pdf->stream('HorarioSemanal.pdf');
    } 
}
