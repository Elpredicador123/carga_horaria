@extends('layouts.plantilla')
@section('contenido')
<div class="row">
    <div class="col-12">
        @if(session('datos'))
        <div class="alert alert-success alert-dismissible fade show mt-3">
            {{session('datos')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
      </div>
<div class="col-12">
    <div class="page-body">
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h5>Carga Horaria - Declaracion de Carga Horaria Asignada</h5>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="fa fa fa-wrench open-card-option"></i></li>
                            <li><i class="fa fa-window-maximize full-card"></i></li>
                            <li><i class="fa fa-minus minimize-card"></i></li>
                            <li><i class="fa fa-refresh reload-card"></i></li>
                            <li><i class="fa fa-trash close-card"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-block table-border-style col-12">
                    <div class="row text-capitalize px-3">
                        <div class="col-12 ">
                            <h6>I. Datos sobre la situacion del profesor</h6>
                        </div>
                        <div class="col-12 py-3 border border-bottom">
                            FACULTAD: {{$item->declaracionjurada->docente->escuela->facultad->descripcion}}
                        </div>
                        <div class="col-12 py-3 border border-bottom">
                            ESCUELA: {{$item->declaracionjurada->docente->escuela->descripcion}}
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-info">
                                <tr>
                                    <th>DOCENTE</th>
                                    <th>CONDICION</th>
                                    <th>CATEGORIA</th>
                                    <th>MODALIDAD</th>
                                    <th>PERIODO</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-capitalize ">
                                    <td>{{$item->declaracionjurada->docente->user->name}}</td>
                                    <td>{{$item->declaracionjurada->docente->condicion->descripcion}}</td>
                                    <td>{{$item->declaracionjurada->docente->categoria->descripcion}}</td>
                                    <td>{{$item->declaracionjurada->docente->modalidad->descripcion.' '.$item->declaracionjurada->docente->modalidad->horas.' H'}}</td>
                                    <td>{{$item->declaracionjurada->periodo->descripcion}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <form action="{{ route('cargalectiva.update', $item->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-lowercase bg-info">
                                    <tr>
                                        <th>NOMBRE CURSO</th>
                                        <th>SECCION</th>
                                        <th>CURSO</th>
                                        <th>CICLO</th>
                                        <th>N° TOT. ALUMNOS</th>
                                        <th>HRSTEO/GRUPOS</th>
                                        <th>HRSPRA/GRUPOS</th>
                                        <th>HRSLAB/GRUPOS</th>
                                        <th>TOTAL HRS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @forelse ($item->detallecargalectivas()->orderBy('ciclo_id')->get() as $detalle)
                                        <tr>
                                            <input type="hidden" name="detallecargalectivas_id[]" value="{{$detalle->id}}">
                                            <td class="text-lowercase">{{$detalle->curso->descripcion}}</td>
                                            <td class="text-uppercase">{{$detalle->seccion->descripcion}}</td>
                                            <td class="text-uppercase">{{$detalle->curso->tipo}}</td>
                                            <td>{{$detalle->ciclo->descripcion}}</td>
                                            <td>aprox. <input style="width: 40px" step="1" value="{{$detalle->numero_alumnos}}" class="bg-primary rounded rounded-3" min="1" max="300"   type="number" name="numero_alumnos[]" required></td>
                                            <td>h.<input style="width: 40px" step="1" value="{{$detalle->horas_teoria}}"  class="bg-primary rounded rounded-3" min="1" max="10" type="number" name="horas_teoria[]" required> x g.<input style="width: 40px" step="1" value="{{$detalle->grupos_teoria}}" class="bg-primary rounded rounded-3" min="1" max="10" type="number" name="grupos_teoria[]" required></td>
                                            <td>h.<input style="width: 40px" step="1" value="{{$detalle->horas_practica}}" class="bg-primary rounded rounded-3" min="0" max="10" type="number" name="horas_practica[]" > x g.<input style="width: 40px" step="1" value="{{$detalle->grupos_practica}}" class="bg-primary rounded rounded-3" min="0" max="10" type="number" name="grupos_practica[]" ></td>
                                            <td>h.<input style="width: 40px" step="1" value="{{$detalle->horas_laboratorio}}" class="bg-primary rounded rounded-3" min="0" max="10" type="number" name="horas_laboratorio[]" > x g.<input style="width: 40px" step="1" value="{{$detalle->grupos_laboratorio}}" class="bg-primary rounded rounded-3" min="0" max="10" type="number" name="grupos_laboratorio[]" ></td>
                                            <td>{{$detalle->horas_teoria*$detalle->grupos_teoria + $detalle->horas_practica*$detalle->grupos_practica + $detalle->horas_laboratorio*$detalle->grupos_laboratorio}}</td>
                                            @php
                                                $total+=$detalle->horas_teoria*$detalle->grupos_teoria + $detalle->horas_practica*$detalle->grupos_practica + $detalle->horas_laboratorio*$detalle->grupos_laboratorio;
                                            @endphp
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="9" class="text-center text-danger"><strong>!!No hay Cursos asignados a la carga horaria</strong></td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="bg-info">
                                    <tr>
                                        <th>#</th>
                                        <th >CARGA</th>
                                        <th>DESCRIPCION</th>
                                        <th>HORAS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($item->detallecargas as $detalle)
                                        <tr>
                                            <input type="hidden" name="detallecargas_id[]" value="{{$detalle->id}}">
                                            <td>{{$detalle->id}}</td>
                                            <td>
                                                <p>
                                                    {{$detalle->carga->titulo}}
                                                </p>
                                            </td>
                                            <td>
                                                <textarea name="descripcion[]" id="" cols="30" rows="3">
                                                    {{$detalle->descripcion}}
                                                </textarea>
                                            </td>
                                            <td>Horas: <input style="width: 40px"  class="bg-primary rounded rounded-3" min="0" max="10" step="1" value="{{$detalle->cantidad_horas}}"  type="number" name="cantidad_horas[]"></td>
                                            @php
                                                $total+=$detalle->cantidad_horas;
                                            @endphp
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="4" class="text-center text-danger"><strong>!!No hay Cargas asignados a la carga horaria</strong></td>
                                        </tr>
                                    @endforelse
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>TOTAL: {{$total}} horas</td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                        <input type="hidden" name="cargalectiva_id" value="{{$item->id}}">
                        <div class="text-center">
                            @if ($item->estado_terminado==0) 
                                <button type="submit" onclick="return confirm('¿Guardar registro de horas?')" class="btn btn-primary" ><i class="fa fa-save"></i> Grabar</button>
                            @endif
                            <a href="{{ route('cargalectiva.cargalectivaslistar')}}" onclick="return confirm('¿Desea cancelar el registro?')" class="btn btn-danger"><i class="fa fa-times"></i>Cancelar</a>
                            @if ($item->estado_terminado==1) 
                            <a href="{{ route('cargalectiva.cargahoraria',$item->cargahoraria->id)}}" class="btn btn-info"><i class="fa fa-arrow-circle-right"></i>Asignacion de Horas</a>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @php
        $bandera=0;
            if ($item->declaracionjurada->docente->modalidad->horas == $total) {
                $bandera =1;
            }
        @endphp
        <div class="col-12 
        @if ($item->estado_terminado==1 || $bandera ==0) d-none @endif
        ">
            <div class="card">
                <div class="card-block text-center">
                        <form action="{{ route('cargalectiva.updatecargalectivaterminado', $item->id) }}" method="post">
                            @csrf
                            @method('POST')
                            <button class="btn btn-primary" type="submit" onclick="return confirm('Terminar Asignacion de la carga?')"><i class="fa fa-check"></i> Terminar Llenado</button>
                        </form>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>  
@endsection