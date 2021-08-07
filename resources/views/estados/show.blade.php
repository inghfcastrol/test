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
            <legend class="col-xs-12 title_page_label" style="margin-top: 1vh;">Información del estado</legend>
            <table class="table">
                <tr>
                    <th class="col-xs-6">Id</th>
                    <td class="col-xs-6">{{ $estado->id }}</td>
                </tr>
                <tr>
                    <th>Nombre a visualizar del estado</th>
                    <td>{{ $estado->nombre_estado }}</td>
                </tr>
                <tr>
                    <th>Texto para la búsqueda de los estados en la BBDD (inmodificable)</th>
                    <td>{{ $estado->texto_estado }}</td>
                </tr>
            </table>
            <legend class="col-xs-12 title_page_label" style="margin-top: 1vh;">Actualizar estado</legend>
            <div id="estados-actualizar-estado" class="col-xs-12" style="min-height: 200px;">
                {!! Form::open(['route' => ['estados.update', $estado->id], 'method' => 'PUT', 'files' => true]) !!}

                    <div class="form-group row">
                        {!! Form::label('nombre_estado', 'Estado', ['class' => ['col-xs-12 col-sm-6', 'col-form-label', 'text-left']] ) !!}

                        <div class="col-xs-12 col-sm-6">
                            {!! Form::text('nombre_estado', $estado->nombre_estado, ['id' => 'nombre_estado', 'class' => ['form-control'], 'required' => true ]) !!}
                        </div>
                    </div>

                    <div class="form-group row" style="/*display: none;">
                        {!! Form::label('texto_estado', 'Texto código', ['class' => ['col-xs-12', 'col-sm-6', 'col-form-label', 'text-left']] ) !!}

                        <div class="col-xs-12 col-sm-6">
                            {!! Form::text('texto_estado', $estado->texto_estado, ['id' => 'texto_estado', 'class' => ['form-control'], 'readonly' => true ]) !!}
                        </div>
                    </div>

                    <hr width="70%">

                    <div class="form-group row">
                        <div class="col-xs-12 text-center">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Actualizar') }}
                            </button>
                            <a href="{{ url('/config/estados') }}" class="btn btn-outline-primary">
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