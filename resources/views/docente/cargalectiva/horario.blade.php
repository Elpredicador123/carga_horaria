@extends('layouts.plantilla')
@section('contenido')
<div class="row">
    <div class="col-md-12">
        @if(session('datos'))
        <div class="alert alert-success alert-dismissible fade show mt-3">
            {{session('datos')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
      </div>
<div class="col-md-12">
    <div class="page-body">
      <div class="row">
        <div class="col-12 
        @if ($item->estado_terminado==1)  @else d-none @endif
        ">
            <div class="card">
                <div class="card-block text-center">
                    <a class="btn btn-info" href="{{ route('cargalectiva.cargalectivasllenar',$item->cargalectiva->id) }}"><i class="fa fa-undo"></i> Volver</a>
                </div>
            </div>
        </div>
          <div class="col">
              <div class="card bg-primary">
                  <div class="card-header">
                    <h5>Carga Horaria - Horario Semanal</h5>
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
                  <div class="card-block">
                    <div class="row text-capitalize px-3">
                        <div class="col-md-12 ">
                            <h6>I. Datos sobre la situacion del profesor</h6>
                        </div>
                        <div class="col-md-12 py-3 border border-bottom">
                            FACULTAD: {{$item->cargalectiva->declaracionjurada->docente->escuela->facultad->descripcion}}
                        </div>
                        <div class="col-md-12 py-3 border border-bottom">
                            ESCUELA: {{$item->cargalectiva->declaracionjurada->docente->escuela->descripcion}}
                        </div>
                    </div>
                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>
  <div class="col-md-12
        @if ($item->estado_terminado==1) d-none @endif
        ">
            <div class="card bg-success">
                <div class="card-header">
                    <h5>Registrar Nuevo Horario Semanal</h5>
                    <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                </div>
                <div class="card-block">
                    <form class="form-material" method="POST" action="{{ route('cargalectiva.storedetallecargahoraria',$item->id) }}" enctype="multipart/form-data"> {{-- enctype="multipart/form-data" permite enviar archivos --}}
                    @csrf
                    <div class="row px-3">
                        <div class="form-check col-md-2 my-auto form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" onclick="activarSelector(this)" type="radio" name="activar" id="curso" value="checkedValue"> Curso
                            </label>
                        </div>
                        <div class="form-group col-md-10 form-default">
                            <label for="detallecargalectiva" class="text-capitalize">curso</label>
                            <select class="form-control bg-light px-3" aria-hidden="true" disabled data-live-search="true" name="detallecargalectiva_id" id="detallecargalectiva">
                                <option value="">Seleccionar</option>
                                @forelse ($item->cargalectiva->detallecargalectivas as $detalle)
                                <option value="{{$detalle->id}}">{{$detalle->curso->descripcion}}</option>
                                @empty
                                <option value="">Sin Registros</option>
                                @endforelse
                            </select>
                            <input type="hidden" name="cargahoraria_id" value="{{$item->id}}">
                        </div>
                        <div class="form-check col-md-2 my-auto form-check-inline">
                            <label class="form-check-label">
                                <input class="form-check-input" onclick="activarSelector(this)" type="radio" name="activar" id="carga" value="checkedValue"> Carga
                            </label>
                        </div>
                        <div class="form-group col-md-10 form-default">
                            <label for="detallecarga" class="text-capitalize">carga</label>
                            <select class="form-control bg-light px-3" aria-hidden="true" disabled data-live-search="true" name="detallecarga_id" id="detallecarga">
                                <option value="">Seleccionar</option>
                                @forelse ($item->cargalectiva->detallecargas()->where('cantidad_horas','>',0)->get() as $detalle)
                                <option value="{{$detalle->id}}">{{$detalle->carga->titulo}}</option>
                                @empty
                                <option value="">Sin Registros</option>
                                @endforelse
                            </select>
                            <input type="hidden" name="cargahoraria_id" value="{{$item->id}}">
                        </div>
                        <div class="form-group col-md-4 form-default d-none">
                            <label for="tipo" class="text-capitalize">tipo</label>
                            <input class="form-control bg-light px-3" type="hidden" id="tipo" name="tipo">
                        </div>
                        <div class="form-group col-md-12 d-none text-light text-center" id="texto_escoger">
                           <strong> ------------ ESCOGE UNA OPCION DE HORARIO ------------</strong>
                        </div>
                        <div class="form-group col-md-12 d-none text-capitalize text-danger text-center" id="texto_horas_completas">
                            <strong>horas completas registradas</strong> 
                        </div>
                        <div class="form-group col-md-4 form-default d-none" id="contenedor_teoria">
                            <label for="teoria" class="text-capitalize"> curso teoria</label>
                            <input class="form-control bg-light px-3" type="text" readonly onclick="seleccionarHora(this)" id="teoria" value="">
                        </div>
                        <div class="form-group col-md-4 form-default d-none" id="contenedor_practica">
                            <label for="practica" class="text-capitalize"> curso practica</label>
                            <input class="form-control bg-light px-3" type="text" readonly onclick="seleccionarHora(this)" id="practica" value="">
                        </div>
                        <div class="form-group col-md-4 form-default d-none" id="contenedor_laboratorio">
                            <label for="laboratorio" class="text-capitalize"> curso laboratorio</label>
                            <input class="form-control bg-light px-3" type="text" readonly onclick="seleccionarHora(this)" id="laboratorio" value="">
                        </div>
                        <div class="form-group col-md-12 form-default d-none" id="contenedor_hora">
                            <label for="hora" class="text-capitalize">horas carga</label>
                            <input class="form-control bg-light px-3" type="text" readonly onclick="seleccionarHora(this)" id="hora" value="">
                        </div>
                        <div class="form-group col-md-3 form-default">
                            <label for="aula" class="text-capitalize">local - aula</label>
                            <select class="form-control select2 select2-hidden-accessible selectpicker"aria-hidden="true" data-live-search="true" name="aula_id" id="aula" required>
                                <option value="">Seleccionar</option>
                                @forelse ($aulas as $aula)
                                <option value="{{$aula->id}}">{{$aula->local->descripcion." - ".$aula->descripcion}}</option>
                                @empty
                                <option value="">Sin Registros</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group col-md-3 form-default">
                            <label for="dia" class="text-capitalize">dia</label>
                            <select class="form-control bg-light px-3" disabled aria-hidden="true" data-live-search="true" name="dia" id="dia" required>
                                <option value="">Seleccionar</option>
                                <option value="1">lunes</option>
                                <option value="2">martes</option>
                                <option value="3">miercoles</option>
                                <option value="4">jueves</option>
                                <option value="5">viernes</option>
                                <option value="6">sabado</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3 form-default">
                            <label for="hora_inicio" class="text-capitalize">inicio</label>
                            <select class="form-control bg-light px-3" disabled aria-hidden="true" data-live-search="true" name="hora_inicio" id="hora_inicio" required>
                                <option value="">Seleccionar</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3 form-default">
                            <label for="hora_fin" class="text-capitalize">final</label>
                            <input class="form-control bg-light px-3" type="text" readonly name="hora_fin" id="hora_fin" required>
                        </div>
                    </div>
                    <div class="text-center">
                        <button id="boton_grabar" type="submit" onclick="return confirm('¿Guardar nueva registro?')" class="btn btn-primary d-none" ><i class="fa fa-save"></i> Grabar</button>
                        <a href="{{ route('cargalectiva.cargalectivasllenar', $item->cargalectiva->id)}}" onclick="return confirm('¿Desea cancelar el registro?')" class="btn btn-danger"><i class="fa fa-times"></i>Cancelar</a>
                    </div>
                    </form>   
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card bg-success">
                <div class="card-header">
                    <h5>Registro Horario Semanal</h5>
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
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="text-lowercase">
                                    <th>DIAS</th>
                                    <th>HORARIO</th>
                                    <th>CURSO</th>
                                    <th>CARGA</th>
                                    <th>LOCAL</th>
                                    <th>AULA</th>
                                    <th>TIPO</th>
                                    <th>SUBTOTAL</th>
                                    <th class="@if ($item->estado_terminado==1) d-none @endif">OPCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $total=0;
                                @endphp
                                @forelse ($item->detallecargahorarias()->orderBy('dia')->orderBy('hora_inicio')->get() as $detalle)
                                    <tr class="text-capitalize ">
                                        <td>
                                            @switch($detalle->dia)
                                                @case(1) Lunes @break
                                                @case(2) Martes @break
                                                @case(3) Miercoles @break
                                                @case(4) Jueves @break
                                                @case(5) Viernes @break
                                                @case(6) Sabado @break
                                                @default Sin dia
                                            @endswitch
                                        </td>
                                        <td>{{$detalle->hora_inicio." - ". $detalle->hora_fin}}</td>
                                        <td>
                                            {{$detalle->detallecargalectiva?$detalle->detallecargalectiva->curso->id:'--------'}}
                                        </td>
                                        <td class="text-lowercase">
                                            {{$detalle->detallecarga?$detalle->detallecarga->carga->titulo:'--------'}}
                                        </td>
                                        <td>{{$detalle->aula->local->descripcion}}</td>
                                        <td>{{$detalle->aula->descripcion}}</td>
                                        <td>{{$detalle->tipo}}</td>
                                        <td>{{$detalle->hora_fin - $detalle->hora_inicio}}</td>
                                        @php
                                            $total+=($detalle->hora_fin - $detalle->hora_inicio);
                                        @endphp
                                        <td class="@if ($item->estado_terminado==1) d-none @endif">
                                            <form action="{{ route('cargalectiva.destroydetallecargahoraria', $detalle->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Eliminar registro de la semana?')"><i class="fa fa-trash"></i> Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center text-danger"><strong>!!No hay registro de horario semanal!!</strong></td>
                                    </tr>
                                @endforelse
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td>TOTAL:</td>
                                    <td>{{$total}}</td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @php
        $bandera=0;
        $acumulador=0;
            foreach ($item->cargalectiva->detallecargalectivas as $key => $detalle) {
                $acumulador+=($detalle->horas_teoria * $detalle->grupos_teoria + $detalle->horas_practica * $detalle->grupos_practica + $detalle->horas_laboratorio * $detalle->grupos_laboratorio);
            }
            foreach ($item->cargalectiva->detallecargas as $key => $detalle) {
                $acumulador+=($detalle->cantidad_horas);
            }
            if ($acumulador == $total) {
                $bandera =1;
            }
        @endphp
        
        <div class="col-12 
        @if ($item->estado_terminado==1 || $bandera ==0) d-none @endif
        ">
            <div class="card">
                <div class="card-block text-center">
                        <form action="{{ route('cargalectiva.updatedetallecargahorariaterminado', $item->id) }}" method="post">
                            @csrf
                            @method('POST')
                            <button class="btn btn-primary" type="submit" onclick="return confirm('Terminar Asignacion de la carga?')"><i class="fa fa-check"></i> Terminar Llenado</button>
                        </form>
                </div>
            </div>
        </div>
</div>  
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha256-4+XzXVhsDmqanXGHaHvgh1gMQKX40OUvDEBTu8JcmNs=" crossorigin="anonymous"></script>
<script>
    let cargahoraria_id='{{$item->id}}';
    let horas_teoria;
    let horas_practica;
    let horas_laboratorio;
    let grupos_teoria;
    let grupos_practica;
    let grupos_laboratorio;
    let horas_hora;
    let ultimo;
    let dia;
$(document).ready(function() {
            $('#detallecargalectiva').change(function() {
                detalleHoras();
            });
            $('#detallecarga').change(function() {
                detalleHoras();
            });
            $('#hora_inicio').change(function() {
                sumarHora();
            });
            $('#dia').change(function() {
                hora_inicio();
            });
        });

function hora_inicio() {
    $('#hora_inicio').empty();
    $('#hora_inicio').append('<option value="">Seleccionar</option>');
    dia = $('#dia').val();
    if (dia) {
        vector=[7,8,9,10,11,12,13,14,15,16,17,18,19,20,21];
        $.get('/horasocupdas/' + cargahoraria_id + "/" + dia, function(horas) {
            console.log(horas)
            for (const i in horas) {
                for (const j in vector) {
                    if (vector[j] == horas[i]) {
                        vector.splice(j, 1);
                    }
                }
            }

            vector.forEach(hora => {
                $('#hora_inicio').append('<option value="' + hora + '" >' + hora + '</option>');
            });
        });
        $('#hora_inicio').prop('disabled',false);
    }else{
        $('#hora_inicio').prop('disabled',true);
    }
}
function sumarHora() {
    console.log("sumando")
    let hora_inicio = parseInt(document.getElementById("hora_inicio").value)
    if (ultimo=="teoria") {
        $('#hora_fin').val(hora_inicio+horas_teoria);
        $('#tipo').val('teoria');
    }
    if (ultimo=="practica") {
        $('#hora_fin').val(hora_inicio+horas_practica);
        $('#tipo').val('practica');
    }
    if (ultimo=="laboratorio") {
        $('#hora_fin').val(hora_inicio+horas_laboratorio);     
        $('#tipo').val('laboratorio');
    }
    if (ultimo=="hora") {
        $('#hora_fin').val(hora_inicio+horas_hora); 
        $('#tipo').val('hora');
    }
}
function seleccionarHora(e) {
    console.log(e.id)
    ultimo=e.id
    let detallecargalectiva = document.getElementById("detallecargalectiva").value
    let detallecarga = document.getElementById("detallecarga").value
    $('#teoria,#practica,#laboratorio,#hora').removeClass('bg-info');
    $('#teoria,#practica,#laboratorio,#hora').removeClass('bg-danger');
    $('#texto_escoger').addClass('d-none');
    $('#hora_inicio').val('');
    $('#hora_fin').val('');
    if (e.id=="teoria") {
        horasCompletas(horas_teoria*grupos_teoria,"detallecargalectiva",detallecargalectiva,'teoria');
    }
    if (e.id=="practica") {
        horasCompletas(horas_practica*grupos_practica,"detallecargalectiva",detallecargalectiva,'practica');
        
    }
    if (e.id=="laboratorio") {
        horasCompletas(horas_laboratorio*grupos_laboratorio,"detallecargalectiva",detallecargalectiva,'laboratorio');
        
    }
    if (e.id=="hora") {
        horasCompletas(horas_hora,"detallecarga",detallecarga,'hora');
        
    }
}
function horasCompletas(cantidad,tipo,detalle_id,tipo_hora) {
    $.get('/horas_completas/' + cargahoraria_id + "/" + cantidad+ "/" + tipo+"/"+detalle_id+"/"+tipo_hora, function(hora) {
        if (hora==1) {
            console.log("verdad")
            $('#'+tipo_hora).addClass('bg-info');
            $('#texto_horas_completas').addClass('d-none');
            $('#dia').prop('disabled',false);
            $('#boton_grabar').removeClass('d-none');
        }else{
            console.log("falso")
            $('#'+tipo_hora).addClass('bg-danger');
            $('#texto_horas_completas').removeClass('d-none');
            $('#dia').prop('disabled',true);
            $('#dia').val('');
            $('#hora_fin').val('');
            $('#boton_grabar').addClass('d-none');
        }
        if (cantidad==0) {
            $('#'+tipo_hora).removeClass('bg-info');
            $('#'+tipo_hora).addClass('bg-danger');
            $('#texto_horas_completas').removeClass('d-none');
            $('#dia').prop('disabled',true);
            $('#dia').val('');
            $('#hora_fin').val('');
            $('#boton_grabar').addClass('d-none');
            $('#hora_inicio').prop('disabled',true);
        }
    })
}
 function activarSelector(e) {
    console.log(e.id)
         let detallecargalectiva = document.getElementById("detallecargalectiva")
         let detallecarga = document.getElementById("detallecarga")
         $('#texto_escoger').addClass('d-none');
         $('#hora_inicio').prop('disabled',true);
     if (e.id == "curso") {
         detallecargalectiva.disabled = false
         detallecargalectiva.required = true
         detallecarga.disabled = true
         detallecarga.required = false
         detallecarga.value = ''
         $('#hora').val('');
        $('#contenedor_hora').addClass('d-none');
     }
     if (e.id == "carga") {
         detallecargalectiva.disabled = true
         detallecargalectiva.required = false
         detallecargalectiva.value = ''
         detallecarga.disabled = false
         detallecarga.required = true
         $('#teoria,#practica,#laboratorio').val('');
        $('#contenedor_teoria,#contenedor_practica,#contenedor_laboratorio').addClass('d-none');
     }
 }

 function detalleHoras() {
            $detallecargalectiva = $("#detallecargalectiva").val();
            $detallecarga = $("#detallecarga").val();
            $('#teoria,#practica,#laboratorio,#hora').removeClass('bg-info');
            $('#teoria,#practica,#laboratorio,#hora').removeClass('bg-danger');
            $('#texto_escoger').removeClass('d-none');
            $('#texto_horas_completas').addClass('d-none');
            $('#hora_inicio').prop('disabled',true);
            $('#hora_inicio').val('');
            $('#hora_fin').val('');
            if ($detallecargalectiva) {
                $id = $detallecargalectiva
                $tipo = 'detallecargalectiva'
            } else if ($detallecarga) {
                $id = $detallecarga
                $tipo = 'detallecarga'
            } 
            if ($detallecargalectiva != '' || $detallecarga != '') {
                $.get('/horas_detallecarga/' + $id + "/" + $tipo, function(hora) {
                    console.log(hora)
                    if ($tipo=='detallecargalectiva') {
                        $('#teoria').val(' N° Horas: '+hora.horas_teoria+' - N° Grupos: '+hora.grupos_teoria);
                        $('#practica').val(' N° Horas: '+hora.horas_practica+' - N° Grupos: '+hora.grupos_practica);
                        $('#laboratorio').val(' N° Horas: '+hora.horas_laboratorio+' - N° Grupos: '+hora.grupos_laboratorio);
                        horas_teoria=hora.horas_teoria
                        horas_practica=hora.horas_practica
                        horas_laboratorio=hora.horas_laboratorio
                        grupos_teoria=hora.grupos_teoria
                        grupos_practica=hora.grupos_practica
                        grupos_laboratorio=hora.grupos_laboratorio
                        $('#contenedor_teoria,#contenedor_practica,#contenedor_laboratorio').removeClass('d-none');
                    } else if ($tipo=='detallecarga'){
                        $('#hora').val(hora.cantidad_horas);
                        horas_hora=hora.cantidad_horas
                        $('#contenedor_hora').removeClass('d-none');
                    }
                });
            }
        }
</script>
@endsection