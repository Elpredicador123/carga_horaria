@extends('layouts.plantilla')
@section('contenido')
<div class="row">
<div class="col-12">
    <div class="page-body">
      <div class="row">
          <div class="col">
              <div class="card">
                  <div class="card-header">
                      <h5>Registrar Declaracion Jurada</h5>
                      <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                  </div>
                  <div class="card-block">
                      <form class="form-material" method="POST" action="{{ route('declaracionjurada.store') }}" enctype="multipart/form-data"> {{-- enctype="multipart/form-data" permite enviar archivos --}}
                        @csrf
                        <div class="row px-3">
                            <div class="form-group col-4 form-default">
                                <label for="docente">Docente</label>
                                <input class="form-control" disabled type="text"  value="{{ Auth::user()->name }}" required="">
                                <input class="form-control" readonly type="hidden" name="docente_id" value="{{ Auth::user()->docente->id }}" required="">
                            </div>
                            <div class="form-group col-2 form-default">
                                <label for="periodo" class="text-capitalize">Periodo</label>
                                <select class="form-control select2 select2-hidden-accessible selectpicker"aria-hidden="true" data-live-search="true" name="periodo_id" id="periodo" required>
                                    <option value="">Seleccionar</option>
                                    @forelse ($periodos as $periodo)
                                    <option value="{{$periodo->id}}">{{$periodo->descripcion}}</option>
                                    @empty
                                    <option value="">Sin Registros</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group col-4 form-default">
                                <label for="documento" class="text-capitalize">Documento</label>
                                <input class="form-control" type="file" name="documento" id="documento" required="">
                            </div>
                            <div class="form-group col-2 form-default">
                                <label for="estado_enviado" class="text-capitalize">Enviar</label>
                                <select class="form-control select2 select2-hidden-accessible selectpicker"aria-hidden="true" data-live-search="true" name="estado_enviado" id="estado_enviado" required>
                                    <option value="">Seleccionar</option>
                                    <option value="0">No</option>
                                    <option value="1">Si</option>
                                </select>
                            </div>
                        </div>
                        <div class="text-center">
                          <button type="submit" onclick="return confirm('¿Guardar nueva capacitacion?')" class="btn btn-primary" ><i class="fa fa-save"></i> Grabar</button>
                          <a href="{{ route('declaracionjurada.index')}}" onclick="return confirm('¿Desea cancelar el registro?')" class="btn btn-danger"><i class="fa fa-times"></i>Cancelar</a>
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