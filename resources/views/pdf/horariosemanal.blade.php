<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Horario Semanal</title>
    <style>
        body {
            font-size: 11px;
            font-weight: bold;
        }
        table {
            text-align: center;
            width: 1020px;
        }
        th {
            border: .1px solid rgb(192, 188, 188);
            padding: 0.5em;
        }
        td {
            border: .1px solid rgb(192, 188, 188);
            padding: 0.3em 1em;
        }
        .titulo{
            background: rgb(21, 101, 138);
            color: white;
        }
        .text-left{
            text-align: left;
        }
        .text-right{
            text-align: right;
        }
        .text-center{
            text-align: center;
        }

        /* .t1_t1_1{
            width: 150px;
        }
        .t1_t1_2{
            width: 340px;
        }
        
        .t2_t1_1{
            width: 53px;
        }
        .t2_t1_2{
            width: 400px;
        } */
    </style>
</head>
<body>
<div class="row">
<div class="col-md-12">
    <div class="page-body">
      <div class="row">
          <div class="col">
              <div class="card bg-primary">
                  <div class="card-header text-center">
                    <h2>HORARIO SEMANAL DEL PERSONAL ACADEMICO</h2>
                </div>
              </div>
          </div>
      </div>
    </div>
  </div>
        <div class="col-12">
            <div class="card bg-success">
                <div class="card-block table-border-style col-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="text-lowercase">
                                    <th colspan="3" class="t1_t1_1 titulo">FACULTAD</th>
                                    <th colspan="5" class="t1_t1_2" >{{$item->cargalectiva->declaracionjurada->docente->escuela->facultad->descripcion}}</th>
                                    <th colspan="3" class="t1_t1_1 titulo" >DPTO. ACADEMICO</th>
                                    <th colspan="5" class="t1_t1_2" >Dpto. de {{$item->cargalectiva->declaracionjurada->docente->escuela->facultad->descripcion}} de {{$item->cargalectiva->declaracionjurada->docente->escuela->descripcion}}</th>
                                </tr>
                                <tr class="text-lowercase">
                                    <th colspan="1" class="titulo">Codigo</th>
                                    <th colspan="1" class="t1_t2_2" >{{$item->cargalectiva->declaracionjurada->docente->id}}</th>
                                    <th colspan="1" class="titulo" >Nombre</th>
                                    <th colspan="5" class="t1_t2_2" >{{$item->cargalectiva->declaracionjurada->docente->user->name}}</th>
                                    <th colspan="1" class="titulo" >Semestre</th>
                                    <th colspan="3" class="t1_t2_2" >{{$item->cargalectiva->declaracionjurada->periodo->descripcion}}</th>
                                    <th colspan="1" class="titulo" >Del</th>
                                    <th colspan="1" class="t1_t2_2" >{{$item->cargalectiva->declaracionjurada->periodo->inicio_periodo}}</th>
                                    <th colspan="1" class="titulo" >Al</th>
                                    <th colspan="1" class="t1_t2_2" >{{$item->cargalectiva->declaracionjurada->periodo->fin_periodo}}</th>
                                </tr>
                            </thead>
                        </table>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr class="text-lowercase">
                                    <th class="t2_t1_1 titulo">#</th>
                                    <th class="t2_t1_1 titulo">DIAS</th>
                                    <th class="t2_t1_1 titulo">HORARIO</th>
                                    <th class="t2_t1_2 titulo">CURSO/CARGA</th>
                                    <th class="t2_t1_1 titulo">LOCAL</th>
                                    <th class="t2_t1_1 titulo">AULA</th>
                                    <th class="t2_t1_1 titulo">TIPO</th>
                                    <th class="t2_t1_1 titulo">TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $n=1;
                                    $total=0;
                                @endphp
                                @forelse ($item->detallecargahorarias()->orderBy('dia')->orderBy('hora_inicio')->get() as $detalle)
                                    <tr class="text-capitalize ">
                                        <td>{{$n}}</td>
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
                                        <td class="text-left">
                                            {{$detalle->detallecargalectiva?$detalle->detallecargalectiva->curso->id:$detalle->detallecarga->carga->titulo}}
                                        </td>
                                        <td>{{$detalle->aula->local->descripcion}}</td>
                                        <td>{{$detalle->aula->descripcion}}</td>
                                        <td>{{$detalle->tipo}}</td>
                                        <td>{{$detalle->hora_fin - $detalle->hora_inicio}}</td>
                                        @php
                                            $total+=($detalle->hora_fin - $detalle->hora_inicio);
                                            $n+=1;
                                        @endphp
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center text-danger"><strong>!!No hay registro de horario semanal!!</strong></td>
                                    </tr>
                                @endforelse
                                <tr>
                                    <td colspan="7" class="text-right">TOTAL</td>
                                    <td>{{$total}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div style="text-align: right;margin: 2em;margin-right: 8em;">
                        {{'Trujillo, '.date('d').' de '.date('M').' del '.date('Y')}}
                    </div>
                    <div style="text-align: left;margin: 1.5em;margin-right: 8em;">
                        ------------------------------------------------------
                        <br>
                        DECANO
                    </div>
                    <div style="text-align: right;margin: 1.5em;">
                        ------------------------------------------------------
                        <br>
                        FIRMA DEL PROFESOR
                    </div>
                    <div style="text-align: left;margin: 1.5em;margin-right: 8em;">
                        ------------------------------------------------------
                        <br>
                        DIRECTOR DE DEPARTAMENTO
                    </div>
                </div>
            </div>
        </div>
</div>  
</body>

</html>