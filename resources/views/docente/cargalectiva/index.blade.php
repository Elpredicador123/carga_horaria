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
    
    <div class="col-12 px-5">
      <div class="page-body">
        <!-- Basic table card start -->
        <div class="card row">
            <div class="card-header col-12">
                <h5>Listado de Carga Lectiva</h5>
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
            <div class="col-12">
              @if ($items)
                {{$items->links()}}
              @endif
            </div>
            <div class="card-block table-border-style col-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ASIGNADO</th>
                                <th>PERIODO</th>
                                <th>CARGA</th>
                                <th>HORARIO</th>
                                <th class="text-center">OPCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                            <tr class="text-capitalize" >
                                <th scope="row">{{$item->cargalectiva->id}}</th>
                                @if ($item->cargalectiva->estado_asignado==0)
                                  <td class="text-warning"><i class="fa fa-clock-o fa-lg"></i> pendiente</td>
                                @else
                                  <td class="text-success"><i class="fa fa-check-circle-o fa-lg"></i> asignado</td>
                                @endif
                                <td>{{$item->cargalectiva->declaracionjurada->periodo->descripcion}}</td>
                                @if ($item->cargalectiva->estado_terminado==0)
                                  <td class="text-warning"><i class="fa fa-clock-o fa-lg"></i> pendiente</td>
                                @else
                                  <td class="text-success"><i class="fa fa-check-circle-o fa-lg"></i> terminada</td>
                                @endif
                                @if ($item->cargalectiva->cargahoraria)
                                    @if ($item->cargalectiva->cargahoraria->estado_terminado==1)
                                    <td class="text-success"><i class="fa fa-check-circle-o fa-lg"></i> terminado</td>
                                    @endif
                                    @if ($item->cargalectiva->cargahoraria->estado_terminado==0)
                                    <td class="text-warning"><i class="fa fa-clock-o fa-lg"></i> pendiente</td>
                                    @endif
                                @else
                                  <td class="text-warning"><i class="fa fa-clock-o fa-lg"></i></td>
                                @endif
                               
                                <td class="d-flex justify-content-center">
                                  @if ($item->cargalectiva->estado_asignado==1)
                                    <a class="btn btn-primary btn-sm" href="{{ route('cargalectiva.cargalectivasllenar',$item->cargalectiva->id) }}"><i class="fa fa-search"></i> Asignacion Carga</a>
                                  @else
                                    <i class="fa fa-clock-o fa-lg text-warning ml-3"></i>
                                  @endif
                                  <a class="btn btn-info btn-sm @if ($item->cargalectiva->estado_terminado==1)  @else d-none @endif " target="_blank" href="{{ route('cargalectiva.imprimirCarga',$item->cargalectiva->id) }}"><i class="fa fa-search"></i> Declaracion Carga</a>
                                  @if ($item->cargalectiva->cargahoraria)
                                    @if ($item->cargalectiva->cargahoraria->estado_terminado==1)
                                    <a class="btn btn-secondary btn-sm " target="_blank" href="{{ route('cargalectiva.imprimirHorario',$item->cargalectiva->cargahoraria->id) }}"><i class="fa fa-search"></i> Horario Semanal</a>
                                    @endif
                                  @endif
                                </td>
                            </tr>
                            @empty
                            <tr>
                              <td colspan="5" class="text-center text-danger"><strong>!!No hay listado de Cargas!!</strong></td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>  
@endsection