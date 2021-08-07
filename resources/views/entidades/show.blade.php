@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="col-xs-12" style="padding-top: 2vh;">@include('flash::message')</div>
    <div class="card marco">
        
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <legend class="col-xs-12 title_page_label" style="margin-top: 1vh;">Información de la entidad</legend>
            <table class="table">
                <tr>
                    <th class="col-xs-6">Id</th>
                    <td class="col-xs-6">{{ $entidad->id }}</td>
                </tr>
                <tr>
                    <th>Nombre a visualizar de la entidad</th>
                    <td>{{ $entidad->nombre_entidad }}</td>
                </tr>
                <tr>
                    <th>Texto para la búsqueda de las entidades en la BBDD (inmodificable)</th>
                    <td>{{ $entidad->texto_entidad }}</td>
                </tr>
                <tr>
                    <th>Estados disponibles</th>
                    <td>
                        @foreach($estadosEntidad as $estado)
                        <li style="list-style: none;">{{ __( '[' . $estado->estado->id . '] ' . $estado->entidad->nombre_entidad . ' ' . $estado->estado->nombre_estado ) }}</li>
                        @endforeach
                    </td>
                </tr>
            </table>
            <legend class="col-xs-12 title_page_label" style="margin-top: 1vh;">Ordenar estados</legend>
            <div id="entidades-ordenar-estados" class="col-xs-12" style="min-height: 200px;">
                {!! Form::open(['route' => 'entidades.ordenarestados', 'method' => 'POST', 'files' => true]) !!}
                    <div class="form-group row" style="display: none;">
                        {!! Form::label('id_entidad', $entidad->nombre_entidad, ['class' => ['col-xs-12 col-sm-6', 'col-form-label', 'text-left']] ) !!}
                        <div class="col-xs-12 col-sm-6">
                            {!! Form::text('id_entidad', $entidad->id, ['id' => 'id_entidad', 'class' => ['form-control'], 'readonly' => true ]) !!}
                        </div>
                    </div>
                    @foreach($estadosEntidad as $estadoEntidad)
                        <div class="form-group row">
                            {!! Form::label('estado_entidad_'.$estadoEntidad->id, 'orden del estado: '.$estadoEntidad->estado->nombre_estado, ['class' => ['col-xs-12 col-sm-6', 'col-form-label', 'text-left']] ) !!}
                            <div class="col-xs-12 col-sm-6">
                                {!! Form::hidden('estados_entidades_ids[]', $estadoEntidad->id, ['id' => 'estado_entidad_'.$estadoEntidad->entidad->texto_entidad, 'class' => ['form-control'], 'readonly' => true ]) !!}

                                {!! Form::text('numero_ordenamiento[]', $estadoEntidad->numero_ordenamiento, ['id' => 'estado_entidad_'.$estadoEntidad->entidad->texto_entidad, 'class' => ['form-control'], 'required' => true ]) !!}
                            </div>
                        </div>
                    @endforeach
                        
                    <hr width="70%">
                    <div class="form-group row">
                        <div class="col-xs-12 text-center">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Ordenar') }}
                            </button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>


            <legend class="col-xs-12 title_page_label" style="margin-top: 1vh;">Actualizar entidad</legend>
            <div id="entidades-actualizar-entidad" class="col-xs-12" style="min-height: 200px;">
                {!! Form::open(['route' => ['entidades.update', $entidad->id], 'method' => 'PUT', 'files' => true]) !!}
                    <div class="form-group row">
                        {!! Form::label('nombre_entidad', 'Entidad', ['class' => ['col-xs-12 col-sm-6', 'col-form-label', 'text-left']] ) !!}
                        <div class="col-xs-12 col-sm-6">
                            {!! Form::text('nombre_entidad', $entidad->nombre_entidad, ['id' => 'nombre_entidad', 'class' => ['form-control'], 'onkeyup' => 'cambiarEspaciosPorUnderline("nombre_entidad", "texto_entidad")', 'required' => true ]) !!}
                        </div>
                    </div>
                    <div class="form-group row" style="/*display: none;">
                        {!! Form::label('texto_entidad', 'Texto entidad', ['class' => ['col-xs-12', 'col-sm-6', 'col-form-label', 'text-left']] ) !!}
                        <div class="col-xs-12 col-sm-6">
                            {!! Form::text('texto_entidad', $entidad->texto_entidad, ['id' => 'texto_entidad', 'class' => ['form-control'], 'readonly' => true ]) !!}
                        </div>
                    </div>
                    <legend>Estados de la entidad</legend>
                    <div class="form-group row">
                        @foreach($estadosIniciales as $estado) 
                        <div class="col-xs-2 col-lg-1 text-center">
                            <input type="checkbox" name="nuevosEstados[]" id="{{ 'estado_inicial_'.$estado->id }}" value="{{ $estado->id }}" @if(in_array($estado->id, $estadosSeleccionados) ) checked @endif>
                        </div>
                        <div class="col-xs-10 col-sm-4 col-lg-3 text-left no-padding">
                            <label for="{{ 'estado_inicial_'.$estado->id }}">{{ $estado->nombre_estado }}</label>
                        </div>
                        @endforeach
                    </div>
                    <hr width="70%">
                    <div class="form-group row">
                        <div class="col-xs-12 text-center">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Actualizar') }}
                            </button>
                            <a href="{{ url('/config/entidades') }}" class="btn btn-outline-primary">
                                {{ __('Ir al listado') }}
                            </a>
                        </div>
                    </div>

                {!! Form::close() !!}
            
            </div>
        </div>
    </div>
</div>
@endsection