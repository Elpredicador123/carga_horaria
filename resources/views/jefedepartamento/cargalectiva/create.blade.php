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
<div class="col-12">
    <div class="page-body">
      <div class="row">
        <div class="col-12">
            <div class="card bg-primary">
                <div class="card-header">
                    <h5>Carga Horaria - Declaracion de Carga Horaria Asignada</h5>
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
                <div class="card-block table-border-style col-12">
                    <div class="row text-capitalize px-3">
                        <div class="col-12">
                            <h6>I. Datos sobre la situacion del profesor</h6>
                        </div>
                        <div class="col-12 py-3 border border-bottom">
                            FACULTAD: {{$item->declaracionjurada->docente->escuela->facultad->descripcion}}
                        </div>
                        <div class="col-12 py-3 border border-bottom">
                            ESCUELA: {{$item->declaracionjurada->docente->escuela->descripcion}}
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>DOCENTE</th>
                                    <th>CONDICION</th>
                                    <th>CATEGORIA</th>
                                    <th>MODALIDAD</th>
                                    <th>PERIODO</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="text-capitalize ">
                                    <td>{{$item->declaracionjurada->docente->user->name}}</td>
                                    <td>{{$item->declaracionjurada->docente->condicion->descripcion}}</td>
                                    <td>{{$item->declaracionjurada->docente->categoria->descripcion}}</td>
                                    <td>{{$item->declaracionjurada->docente->modalidad->descripcion.' '.$item->declaracionjurada->docente->modalidad->horas.' H'}}</td>
                                    <td>{{$item->declaracionjurada->periodo->descripcion}}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12
        @if ($item->estado_asignado==1) d-none @endif
        ">
            <div class="card bg-success">
                <div class="card-header">
                    <h5>Registrar Cursos a Carga Horaria</h5>
                    <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                </div>
                <div class="card-block">
                    <form class="form-material" method="POST" action="{{ route('cargalectiva.store') }}" enctype="multipart/form-data"> {{-- enctype="multipart/form-data" permite enviar archivos --}}
                    @csrf
                    <div class="row px-3">
                        <div class="form-group col-md-4 form-default">
                            <label for="escuela" class="text-capitalize">Escuela</label>
                            <select class="form-control select2 select2-hidden-accessible selectpicker"aria-hidden="true" disabled data-live-search="true" id="escuela" required>
                                <option value="">Seleccionar</option>
                                @forelse ($escuelas as $escuela)
                                <option value="{{$escuela->id}}" {{$escuela->id==$item->declaracionjurada->docente->escuela->id ? 'selected':''}}>{{$escuela->descripcion}}</option>
                                @empty
                                <option value="">Sin Registros</option>
                                @endforelse
                            </select>
                            <input type="hidden" name="escuela_id" value="{{$item->declaracionjurada->docente->escuela->id}}">
                            <input type="hidden" name="cargalectiva_id" value="{{$item->id}}">
                        </div>
                        <div class="form-group col-md-4 form-default">
                            <label for="ciclo" class="text-capitalize">Ciclo</label>
                            <select class="form-control select2 select2-hidden-accessible selectpicker"aria-hidden="true" data-live-search="true" name="ciclo_id" id="ciclo" required>
                                <option value="">Seleccionar</option>
                                @forelse ($ciclos->where('tipo',$item->declaracionjurada->periodo->tipo) as $ciclos)
                                <option value="{{$ciclos->id}}">{{$ciclos->descripcion}}</option>
                                @empty
                                <option value="">Sin Registros</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group col-md-4 form-default">
                            <label for="seccion" class="text-capitalize">seccion</label>
                            <select class="form-control select2 select2-hidden-accessible selectpicker"aria-hidden="true" data-live-search="true" name="seccion_id" id="seccion" required>
                                <option value="">Seleccionar</option>
                                @forelse ($secciones as $seccion)
                                <option value="{{$seccion->id}}">{{$seccion->descripcion}}</option>
                                @empty
                                <option value="">Sin Registros</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="form-group col-md-6 form-default">
                            <label for="curso" class="text-capitalize">Curso</label>
                            <select class="form-control select2 select2-hidden-accessible selectpicker"aria-hidden="true" data-live-search="true" name="curso_id" id="curso" required>
                                <option value="">Seleccionar</option>
                                @forelse ($cursos->whereNotIn('id',$item->detallecargalectivas->pluck('curso_id')) as $curso)
                                <option value="{{$curso->id}}">{{$curso->descripcion}}</option>
                                @empty
                                <option value="">Sin Registros</option>
                                @endforelse
                            </select>
                        </div>
                        

                    </div>
                    <div class="text-center">
                        <button type="submit" onclick="return confirm('¿Guardar nueva capacitacion?')" class="btn btn-primary" ><i class="fa fa-save"></i> Grabar</button>
                        <a href="{{ route('cargalectiva.index')}}" onclick="return confirm('¿Desea cancelar el registro?')" class="btn btn-danger"><i class="fa fa-times"></i>Cancelar</a>
                    </div>
                    </form>   
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card bg-success">
                <div class="card-header">
                    <h5>Cursos Asignados</h5>
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
                <div class="card-block table-border-style col-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ESCUELA</th>
                                    <th>CICLO</th>
                                    <th>CURSO</th>
                                    <th>SECCION</th>
                                    <th class="@if ($item->estado_asignado==1) d-none @endif">OPCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($item->detallecargalectivas()->orderBy('ciclo_id')->get() as $detalle)
                                    <tr class="text-capitalize ">
                                        <td>{{$detalle->escuela->descripcion}}</td>
                                        <td>{{$detalle->ciclo->descripcion}}</td>
                                        <td>{{$detalle->curso->descripcion}}</td>
                                        <td>{{$detalle->seccion->descripcion}}</td>
                                        <td class="@if ($item->estado_asignado==1) d-none @endif">
                                            <form action="{{ route('cargalectiva.destroy', $detalle->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Eliminar Curso de la carga?')"><i class="fa fa-trash"></i> Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-danger"><strong>!!No hay Cursos asignados a la carga horaria</strong></td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 
        @if ($item->estado_asignado==1) d-none @endif
            ">
            <div class="card bg-info">
                <div class="card-header">
                    <h5>Registrar Cargas a Carga Horaria</h5>
                    <!--<span>Add class of <code>.form-control</code> with <code>&lt;input&gt;</code> tag</span>-->
                </div>
                <div class="card-block">
                    <form class="form-material" method="POST" action="{{ route('cargalectiva.storedetallecarga') }}" enctype="multipart/form-data"> {{-- enctype="multipart/form-data" permite enviar archivos --}}
                    @csrf
                    @method('POST')
                    <div class="row px-3">
                        <div class="form-group col-12 form-default">
                            <label for="carga" class="text-capitalize">Carga</label>
                            <select multiple="multiple" class="form-control select2 select2-hidden-accessible selectpicker" aria-hidden="true" data-live-search="true" name="cargas_id[]" id="carga" required>
                                @forelse ($cargas as $carga)
                                <option value="{{$carga->id}}">{{$carga->titulo}}</option>
                                @empty
                                <option value="">Sin Registros</option>
                                @endforelse
                            </select>
                            <input type="hidden" name="cargalectiva_id" value="{{$item->id}}">
                        </div>

                    </div>
                    <div class="text-center">
                        <button type="submit" onclick="return confirm('¿Guardar nueva capacitacion?')" class="btn btn-primary" ><i class="fa fa-save"></i> Grabar</button>
                        <a href="{{ route('cargalectiva.index')}}" onclick="return confirm('¿Desea cancelar el registro?')" class="btn btn-danger"><i class="fa fa-times"></i>Cancelar</a>
                    </div>
                    </form>   
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card bg-info">
                <div class="card-header">
                    <h5>Cargas Asignados</h5>
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
                <div class="card-block table-border-style col-12">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>CARGA</th>
                                    <th class="@if ($item->estado_asignado==1) d-none @endif">OPCIONES</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($item->detallecargas as $de)
                                    <tr class="text-capitalize ">
                                        <td>{{$de->id}}</td>
                                        <td>{{$de->carga->titulo}}</td>
                                        <td class="@if ($item->estado_asignado==1) d-none @endif">
                                            <form action="{{ route('cargalectiva.destroydetallecarga', $de->id) }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Eliminar Curso de la carga?')"><i class="fa fa-trash"></i> Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center text-danger"><strong>!!No hay Cargas asignados a la carga horaria</strong></td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 
        @if ($item->estado_asignado==1) d-none @endif
        ">
            <div class="card">
                <div class="card-block text-center">
                        <form action="{{ route('cargalectiva.updatecargalectivaasignacion', $item->id) }}" method="post">
                            @csrf
                            @method('POST')
                            <button class="btn btn-primary" type="submit" onclick="return confirm('Terminar Asignacion de la carga?')"><i class="fa fa-check"></i> Terminar Asignacion</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
    </div>
  </div>
</div>  
@endsection