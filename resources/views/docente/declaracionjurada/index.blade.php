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
                <h5>Listado de Declaraciones Juradas</h5>
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
                <div class="row">
                    <div class="col-md-6 my-2">
                        <a class="btn btn-primary" href="{{ route('declaracionjurada.create') }}"><i class="fa fa-plus"></i> Nueva Declaracion Jurada</a>
                    </div>
                    <div class="col-md-6 my-2">
                        <a class="btn btn-success float-md-right" href="{{ route('declaracionjurada.plantilla') }}"><i class="fa fa-download"></i> Plantilla - Declaracion Jurada</a>
                    </div>
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
                                <th>PERIODO</th>
                                <th>ESTADO</th>
                                <th>DECLARACION</th>
                                <th>OPCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                            <tr>
                                <th scope="row">{{$item->id}}</th>
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
                                  <a class="btn btn-primary btn-sm" target="_blank" href="{{ route('declaracionjurada.imprimir_declaracionjurada',$item->id) }}"><i class="fa fa-download mr-1"></i></a>
                                </td>
                                <td>
                                  <a class="btn btn-primary" href="{{ route('declaracionjurada.edit',$item->id) }}"><i class="fa fa-search"></i> Detalle</a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="text-center text-danger"><strong>!!No hay listado de Declaracion Jurada!!</strong></td>
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