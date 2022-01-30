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
                <h5>Listado para Evaluar Declaraciones Juradas</h5>
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
                {{$items->links()}}
            </div>
            <div class="card-block table-border-style col-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>DOCENTE</th>
                                <th>PERIODO</th>
                                <th>ESTADO</th>
                                <th>OPCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                            <tr>
                                <th scope="row">{{$item->id}}</th>
                                <td>{{$item->docente->user->name}}</td>
                                <td>{{$item->periodo->descripcion}}</td>
                                @if($item->estado=='aprobado')  
                                <td class="text-success"><i class="fa fa-check-circle-o fa-lg mr-1"></i> {{$item->estado}}</td>
                                @endif
                                @if($item->estado=='rechazado')  
                                    <td class="text-danger"><i class="fa fa-times-circle fa-lg mr-1"></i> {{$item->estado}}</td>
                                @endif
                                @if($item->estado=='pendiente')  
                                    <td class="text-secondary"><i class="fa fa-clock-o fa-lg mr-1"></i> {{$item->estado}}</td>
                                @endif
                                @if($item->estado=='observado')  
                                    <td class="text-warning"><i class="fa fa-eye fa-lg mr-1"></i> {{$item->estado}}</td>
                                @endif
                                <td>
                                  <a class="btn btn-primary" href="{{ route('declaracionjurada.editdeclaracionevaluar',$item->id) }}"><i class="fa fa-search"></i> Detalle</a>
                                </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-danger"><strong>!!No hay listado de Declaraciones Juradas!!</strong></td>
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