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
                <h5>Listado de Usuarios</h5>
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
                    <div class="col-md-12 my-2">
                        <a class="btn btn-primary" href="{{ route('usuarios.create','docente') }}"><i class="fa fa-plus"></i> Nuevo Docente</a>
                        <a class="btn btn-success" href="{{ route('usuarios.create','jefedepartamento') }}"><i class="fa fa-plus"></i> Nuevo Jurado de Departamento</a>
                    </div>
                </div>
            </div>
            <div class="col-12">
                {{$usuarios->links()}}
            </div>
            <div class="card-block table-border-style col-12">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>NOMBRE</th>
                                <th>DNI</th>
                                <th>ROL</th>
                                <th>CORREO</th>
                                <th>OPCCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($usuarios as $usuario)
                            <tr>
                                <th scope="row">{{$usuario->id}}</th>
                                <td>{{$usuario->name}}</td>
                                <td>{{$usuario->dni}}</td>
                                <td>{{$usuario->rol->descripcion}}</td>
                                <td>{{$usuario->email}}</td>
                                <td>
                                    @if ($usuario->rol->descripcion=='docente')
                                        <a class="btn btn-primary btn-sm" href="{{ route('usuarios.edit',[$usuario->id,'docente']) }}"><i class="fa fa-search"></i></a>
                                    @endif
                                    @if ($usuario->rol->descripcion=='jefe departamento')
                                        <a class="btn btn-primary btn-sm" href="{{ route('usuarios.edit',[$usuario->id,'jefedepartamento']) }}"><i class="fa fa-search"></i></a>
                                    @endif
                                </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center text-danger"><strong>!!No hay listado de Usuarios!!</strong></td>
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