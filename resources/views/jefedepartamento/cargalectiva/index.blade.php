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
                                <th>ASIGNADO</th>
                                <th>OPCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($items as $item)
                            <tr>
                                <th scope="row">{{$item->id}}</th>
                                <td>{{$item->declaracionjurada->docente->user->name}}</td>
                                <td>{{$item->declaracionjurada->periodo->descripcion}}</td>
                                @if ($item->estado_asignado == 0)
                                  <td class="text-warning"><i class="fa fa-clock-o fa-lg ml-4"></i> pendiente</td>
                                @else
                                  <td class="text-success"><i class="fa fa-check-circle-o fa-lg ml-4"></i> asignado</td>
                                @endif
                                <td>
                                  <a class="btn btn-primary" href="{{ route('cargalectiva.create',$item->id) }}"><i class="fa fa-search"></i>Asignacion Detalle</a>
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