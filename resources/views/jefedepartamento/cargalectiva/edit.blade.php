@extends('layouts.plantilla')
@section('contenido')
<div class="row">
<div class="col-12">
    <div class="page-body">
      <div class="row">
          <div class="col">
              <div class="card">
                  <div class="card-header">
                      <h5>Evaluar Declaracion Jurada</h5>
                      <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                  </div>
                  <div class="card-block">
                      <form class="form-material" method="POST" action="{{ route('declaracionjurada.updatedeclaracionevaluar',$item->id) }}" enctype="multipart/form-data"> {{-- enctype="multipart/form-data" permite enviar archivos --}}
                        @csrf
                        @method("PUT")
                        <div class="row px-3">
                            <div class="form-group col-4 form-default">
                                <label for="docente">Docente</label>
                                <input class="form-control" disabled type="text"  value="{{ $item->docente->user->name }}" required="">
                                <input class="form-control" disabled type="hidden" name="docente_id" value="{{ $item->docente->id }}" required="">
                            </div>
                            <div class="form-group col-4 form-default">
                                <label for="periodo" class="text-capitalize">Periodo</label>
                                <select class="form-control select2 select2-hidden-accessible selectpicker" disabled aria-hidden="true" data-live-search="true" name="periodo_id" id="periodo" required>
                                    <option value="">Seleccionar</option>
                                    @forelse ($periodos as $periodo)
                                    <option value="{{$periodo->id}}" {{$periodo->id==$item->periodo_id ? 'selected':''}} >{{$periodo->descripcion}}</option>
                                    @empty
                                    <option value="">Sin Registros</option>
                                    @endforelse
                                </select>
                            </div>
                            <div class="form-group col-4 form-default">
                                <label for="estado">Estado</label>
                                <select class="form-control select2 select2-hidden-accessible selectpicker" aria-hidden="true" data-live-search="true" name="estado" id="estado" required>
                                    <option value="">Seleccionar</option>
                                    <option value="pendiente" {{"pendiente"==$item->estado ? 'selected':''}} > Pendiente</option>
                                    <option value="aprobado" {{"aprobado"==$item->estado ? 'selected':''}} > Aprobado</option>
                                    <option value="rechazado" {{"rechazado"==$item->estado ? 'selected':''}} > Rechazado</option>
                                    <option value="observado" {{"observado"==$item->estado ? 'selected':''}} > Observado</option>
                                </select>
                            </div>
                        </div>
                        <div class="text-center">
                          <button type="submit" onclick="return confirm('¿Guardar nueva capacitacion?')" class="btn btn-primary
                          @if ($item->estado=="aprobado" || $item->estado=="rechazado")
                              d-none
                          @endif" ><i class="fa fa-save"></i> Grabar</button>
                          <a href="{{ route('declaracionjurada.listardeclaracionevaluar')}}" onclick="return confirm('¿Desea cancelar la evaluacion?')" class="btn btn-danger"><i class="fa fa-times"></i>Cancelar</a>
                          <a class="btn btn-success" href="{{ route('declaracionjurada.descarga', $item->id) }}"><i class="fa fa-download"></i> Documento</a>
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