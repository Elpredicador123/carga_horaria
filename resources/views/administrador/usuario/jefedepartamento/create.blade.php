@extends('layouts.plantilla')
@section('contenido')
<div class="row">
<div class="col-12">
    <div class="page-body">
      <div class="row">
          <div class="col">
              <div class="card">
                  <div class="card-header">
                      <h5>Registrar Usuario Jefe de Departamento</h5>
                      <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                  </div>
                  <div class="card-block">
                      <form class="form-material" method="POST" action="{{ route('usuarios.store','jefedepartamento') }}" enctype="multipart/form-data"> {{-- enctype="multipart/form-data" permite enviar archivos --}}
                        @csrf
                        <div class="row px-3">
                            <input type="hidden" name="rol_id" value="{{$rol[0]->id}}" id="">
                            <div class="form-group col-md-4 form-default">
                                <label for="rol" class="text-capitalize">Tipo</label>
                                <select class="form-control select2 select2-hidden-accessible selectpicker" disabled aria-hidden="true" data-live-search="true" name="rol_id" id="rol" required>
                                    <option value="">Seleccionar</option>
                                    @forelse ($rol as $r)
                                    <option value="{{$r->id}}" {{($r->descripcion=='jefe departamento')?'selected':''}}>{{$r->descripcion}}</option>
                                    @empty
                                    <option value="">Sin Registros</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group col-md-4 form-default">
                                <label for="escuela" class="text-capitalize">escuela</label>
                                <select class="form-control select2 select2-hidden-accessible selectpicker" aria-hidden="true" data-live-search="true" name="escuela_id" id="escuela" required>
                                    <option value="">Seleccionar</option>
                                    @forelse ($escuelas as $escuela)
                                    <option value="{{$escuela->id}}">{{$escuela->descripcion}}</option>
                                    @empty
                                    <option value="">Sin Registros</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group col-md-6 form-default">
                                <input class="form-control" type="text" name="name" required="">
                                <span class="form-bar"></span>
                                <label class="float-label">Nombre: </label>
                            </div>
                            <div class="form-group col-md-6 form-default">
                                <input class="form-control" type="email"  name="email" required="">
                                <span class="form-bar"></span>
                                <label class="float-label">Email: </label>
                            </div>
                            <div class="form-group col-md-3 form-default">
                                <input class="form-control" type="text" minlength="8" maxlength="8" name="dni" required="">
                                <span class="form-bar"></span>
                                <label class="float-label">DNI: </label>
                            </div>
                        </div>
                        <div class="text-center">
                          <button type="submit" onclick="return confirm('¿Guardar nuevo Usuario Jefe Departamento?')" class="btn btn-primary" ><i class="fa fa-save"></i> Grabar</button>
                          <a href="{{ route('usuarios.index')}}" onclick="return confirm('¿Desea cancelar el registro?')" class="btn btn-danger"><i class="fa fa-times"></i>Cancelar</a>
                        </div>
                      </form>   
                  </div>
              </div>
          </div>
      </div>
    </div>
  </div>
</div>  
@endsection