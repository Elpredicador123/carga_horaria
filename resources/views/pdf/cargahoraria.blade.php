<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Carga Horaria</title>
    <style>
        body {
            font-size: 10.5px;
            font-weight: bold;
        }
        table {
            text-align: center;
            width: 700px;
        }
        th {
            border: .1px solid rgb(192, 188, 188);
            background: rgb(21, 101, 138);
            color: white;
            padding: 0.5em;
        }
        td {
            border: .1px solid rgb(192, 188, 188);
            padding: 0.3em 1em;
        }
        
        .t2_d{
            font-size: 10px;
        }
        .t1_st_1{
            width: 100px;
            text-align: left;
        }
        .t1_st_2{
            width: 75px;
        }
        .t1_t_1{
            width: 250px;
            text-align: left;
        }
        .t1_t_2{
            width: 131px;
        }
        .t1_d_1{
            text-align: left;
        }
        .t2_st_1{
            width: 670px;
            text-align: left;
        }
        .t2_t_1{
            width: 300px;
        }
        .t2_t_2{
            width: 35.2px;
        }
        .t3_t_1{
            width: 250px;
        }
        .t3_t_2{
            width: 360px;
        }
        .t3_t_3{
            width: 10px;
        }
        .t3_d_1{
            text-align: left;
        }
        .t3_sd_1{
            text-align: right;
        }
    </style>
</head>
<body>
<div class="row">
<div class="col-12">
    <div class="page-body">
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 style="text-align: center">DECLARACION DE CARGA HORARIA ASIGNADA</h3>
                </div>
                <div class="card-block table-border-style col-12">
                    <div class="row text-capitalize px-3">
                        <div>
                            <h3>I. DATOS SOBRE LA SITUACION DEL PROFESOR:</h3>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-info">
                                <tr>
                                    <th class="t1_st_1">FACULTAD</th>
                                    <th class="t1_st_2" style="background: white;color:black;">{{$item->declaracionjurada->docente->escuela->facultad->descripcion}}</th>
                                    <th class="t1_st_1">ESCUELA</th>
                                    <th class="t1_st_2" style="background: white;color:black;">{{$item->declaracionjurada->docente->escuela->descripcion}}</th>
                                </tr>
                                <tr>
                                    <th class="t1_t_1">NOMBRE COMPLETO</th>
                                    <th class="t1_t_2">CONDICION</th>
                                    <th class="t1_t_2">CATEGORIA</th>
                                    <th class="t1_t_2">MODALIDAD</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-capitalize">
                                    <td class="t1_d_1">{{$item->declaracionjurada->docente->user->name}}</td>
                                    <td>{{$item->declaracionjurada->docente->condicion->descripcion}}</td>
                                    <td>{{$item->declaracionjurada->docente->categoria->descripcion}}</td>
                                    <td>{{$item->declaracionjurada->docente->modalidad->descripcion.' '.$item->declaracionjurada->docente->modalidad->horas.' H'}}</td>
                                </tr>
                                <tr class="text-capitalize">
                                    <td class="t1_d_1">AÑO ACADEMICO: {{$item->declaracionjurada->periodo->descripcion}}</td>
                                    <td colspan="3">{{'INICIO: '.$item->declaracionjurada->periodo->inicio_periodo.' - FINAL: '.$item->declaracionjurada->periodo->fin_periodo}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="text-lowercase bg-info">
                                    <tr>
                                        <th class="t2_st_1" colspan="10">1. TRABAJO LECTIVO.- Datos completos y con claridad</th>
                                    </tr>
                                    <tr>
                                        <th class="t2_t_2">#</th>
                                        <th class="t2_t_1">NOMBRE CURSO</th>
                                        <th class="t2_t_2">SEC</th>
                                        <th class="t2_t_2">CUR</th>
                                        <th class="t2_t_2">CIC</th>
                                        <th class="t2_t_2">N°AL</th>
                                        <th class="t2_t_2">H.T</th>
                                        <th class="t2_t_2">H.L</th>
                                        <th class="t2_t_2">TOTAL</th>
                                    </tr>
                                </thead>
                                <tbody class="t2_d">
                                    @php
                                        $total = 0;
                                    @endphp
                                    @forelse ($item->detallecargalectivas()->orderBy('ciclo_id')->get() as $detalle)
                                        <tr>
                                            <td>{{$detalle->curso->id}}</td>
                                            <td class="text-lowercase">{{$detalle->curso->descripcion}}</td>
                                            <td class="text-uppercase">{{$detalle->seccion->descripcion}}</td>
                                            <td class="text-uppercase">{{$detalle->curso->tipo}}</td>
                                            <td>{{$detalle->ciclo->descripcion}}</td>
                                            <td>{{$detalle->numero_alumnos}}</td>
                                            <td>{{$detalle->horas_teoria}} x {{$detalle->grupos_teoria}}</td>
                                            <td>{{$detalle->horas_laboratorio}} x {{$detalle->grupos_laboratorio}}</td>
                                            <td>{{$detalle->horas_teoria*$detalle->grupos_teoria + $detalle->horas_laboratorio*$detalle->grupos_laboratorio}}</td>
                                            @php
                                                $total+=$detalle->horas_teoria*$detalle->grupos_teoria + $detalle->horas_laboratorio*$detalle->grupos_laboratorio;
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
                                        <th class="t3_t_1">CARGA</th>
                                        <th class="t3_t_2">DESCRIPCION</th>
                                        <th class="t3_t_3">HORAS</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($item->detallecargas as $detalle)
                                        <tr>
                                            <td class="t3_d_1 ">
                                                {{$detalle->carga->titulo}}
                                                <br>
                                                {{$detalle->carga->descripcion}}
                                            </td>
                                            <td style="text-align: left;text-transform: lowercase;">{{$detalle->descripcion}}</td>
                                            <td class="t3_t_3">{{$detalle->cantidad_horas}}</td>
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
                                            <td class="t3_sd_1" colspan="2">TOTAL</td>
                                            <td class="t3_t_3">{{$total}}</td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                        <div style="text-align: right;margin: 2em;margin-right: 8em;">
                             {{'Trujillo, '.date('d').' de '.date('M').' del '.date('Y')}}
                        </div>
                        <div style="text-align: left;margin: 1.5em;margin-right: 8em;">
                            --------------------------------------
                            <br>
                                    Firma del Profesor 
                        </div>
                        <div style="text-align: right;margin: 1.5em;">
                            --------------------------------------
                            <br>
                                    Firma del Director de Dpto. 
                        </div>
                        <div style="text-align: left;margin: 1.5em;margin-right: 8em;">
                            --------------------------------------
                            <br>
                                    V° B° DECANO FAC.
                        </div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>  
</body>

</html>