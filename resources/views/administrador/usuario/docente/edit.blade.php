@extends('layouts.plantilla')
@section('contenido')
<div class="row">
<div class="col-12">
    <div class="page-body">
      <div class="row">
          <div class="col">
              <div class="card">
                  <div class="card-header">
                      <h5>Registrar Usuario Docente</h5>
                      <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                  </div>
                  <div class="card-block">
                      <form class="form-material" method="POST" action="{{ route('usuarios.update',[$usuario->id,'docente']) }}" enctype="multipart/form-data"> {{-- enctype="multipart/form-data" permite enviar archivos --}}
                        @csrf
                        @method('put')
                        <div class="row px-3">
                            <input type="hidden" name="rol_id" value="{{$usuario->rol_id}}" id="">
                            <input type="hidden" name="docente_id" value="{{$usuario->docente->id}}" id="">
                            <div class="form-group col-md-2 form-default">
                                <label for="rol" class="text-capitalize">Tipo</label>
                                <select class="form-control select2 select2-hidden-accessible selectpicker" disabled aria-hidden="true" data-live-search="true" name="rol_id" id="rol" required>
                                    <option value="">Seleccionar</option>
                                    @forelse ($rol as $r)
                                    <option value="{{$r->id}}" {{($r->id==$usuario->rol_id)?'selected':''}}>{{$r->descripcion}}</option>
                                    @empty
                                    <option value="">Sin Registros</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group col-md-2 form-default">
                                <label for="condicion" class="text-capitalize">Condicion</label>
                                <select class="form-control select2 select2-hidden-accessible selectpicker" aria-hidden="true" data-live-search="true" name="condicion_id" id="condicion" required>
                                    <option value="">Seleccionar</option>
                                    @forelse ($condiciones as $condicion)
                                    <option value="{{$condicion->id}}" {{($condicion->id==$usuario->docente->condicion_id)?'selected':''}} >{{$condicion->descripcion}}</option>
                                    @empty
                                    <option value="">Sin Registros</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group col-md-2 form-default">
                                <label for="categoria" class="text-capitalize">categoria</label>
                                <select class="form-control select2 select2-hidden-accessible selectpicker" aria-hidden="true" data-live-search="true" name="categoria_id" id="categoria" required>
                                    <option value="">Seleccionar</option>
                                    @forelse ($categorias as $categoria)
                                    <option value="{{$categoria->id}}" {{($categoria->id==$usuario->docente->categoria_id)?'selected':''}}>{{$categoria->descripcion}}</option>
                                    @empty
                                    <option value="">Sin Registros</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group col-md-3 form-default">
                                <label for="modalidad" class="text-capitalize">modalidad</label>
                                <select class="form-control select2 select2-hidden-accessible selectpicker" aria-hidden="true" data-live-search="true" name="modalidad_id" id="modalidad" required>
                                    <option value="">Seleccionar</option>
                                    @forelse ($modalidades as $modalidad)
                                    <option value="{{$modalidad->id}}" {{($modalidad->id==$usuario->docente->modalidad_id)?'selected':''}}>{{$modalidad->descripcion.' '.$modalidad->horas.' H'}}</option>
                                    @empty
                                    <option value="">Sin Registros</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group col-md-3 form-default">
                                <label for="escuela" class="text-capitalize">escuela</label>
                                <select class="form-control select2 select2-hidden-accessible selectpicker" aria-hidden="true" data-live-search="true" name="escuela_id" id="escuela" required>
                                    <option value="">Seleccionar</option>
                                    @forelse ($escuelas as $escuela)
                                    <option value="{{$escuela->id}}" {{($escuela->id==$usuario->docente->escuela_id)?'selected':''}}>{{$escuela->descripcion}}</option>
                                    @empty
                                    <option value="">Sin Registros</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group col-md-6 form-default">
                                <input class="form-control" type="text" value="{{$usuario->name}}" name="name" required="">
                                <span class="form-bar"></span>
                                <label class="float-label">Nombre: </label>
                            </div>
                            <div class="form-group col-md-6 form-default">
                                <input class="form-control" type="email" value="{{$usuario->email}}"  name="email" required="">
                                <span class="form-bar"></span>
                                <label class="float-label">Email: </label>
                            </div>
                            <div class="form-group col-md-3 form-default">
                                <input class="form-control" type="text" value="{{$usuario->dni}}" minlength="8" maxlength="8" name="dni" required="">
                                <span class="form-bar"></span>
                                <label class="float-label">DNI: </label>
                            </div>
                        </div>
                        <div class="text-center">
                          <button type="submit" onclick="return confirm('¿Guardar Usuario Docente?')" class="btn btn-primary" ><i class="fa fa-save"></i> Grabar</button>
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