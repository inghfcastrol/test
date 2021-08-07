@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="col-xs-12" style="padding-top: 2vh;">
        @include('flash::message')
    </div>
    <div class="card marco">
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <legend class="col-xs-12 title_page_label" style="margin-top: 1vh;">Nueva Entidad</legend>
            <div id="entidades-nueva-entidad" class="col-xs-12" style="min-height: 200px;">
                {!! Form::open(['route' => 'entidades.store', 'method' => 'POST', 'files' => true]) !!}
                    <div class="form-group row">
                        {!! Form::label('nombre_entidad', 'Entidad', ['class' => ['col-xs-12 col-sm-6', 'col-form-label', 'text-left']] ) !!}
                        <div class="col-xs-12 col-sm-6">
                            {!! Form::text('nombre_entidad', null, ['id' => 'nombre_entidad', 'class' => ['form-control'], 'onkeyup' => 'cambiarEspaciosPorUnderline("nombre_entidad", "texto_entidad")', 'required' => true ]) !!}
                        </div>
                    </div>
                    <div class="form-group row">
                        {!! Form::label('texto_entidad', 'Texto código', ['class' => ['col-xs-12 col-sm-6', 'col-form-label', 'text-left']] ) !!}
                        <div class="col-xs-12 col-sm-6">
                            {!! Form::text('texto_entidad', null, ['id' => 'texto_entidad', 'class' => ['form-control'], 'readonly' => true ]) !!}
                        </div>
                    </div>
                    <legend>Estados de la entidad</legend>
                    <div class="form-group row">
                        @foreach($estadosIniciales as $estado) 
                        <div class="col-xs-2 col-lg-1 text-center">
                            <input type="checkbox" name="estadosIniciales[]" id="{{ 'estado_inicial_'.$estado->id }}" value="{{ $estado->id }}">
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
                                {{ __('Crear') }}
                            </button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
            <legend id="label_listado_entidades" class="col-xs-12 title_page_label">Listado de entidades ({{ count($entidades) }})</legend>
            <table class="table table-responsive">
            	<thead>
            		<th>Id</th>
                    <th>Nombre de entidad</th>
                    <th>Texto del código</th>
                    <th class="text-center">Acciones</th>
            	</thead>
            	<tbody>
            		@foreach($entidades as $entidad)
            			<tr class="fila">
            				<td>{{ $entidad->id }}</td>
                            <td>{{ $entidad->nombre_entidad }}</td>
                            <td>{{ $entidad->texto_entidad }}</td>
                            <td class="text-center"><a href="{{ route('entidades.show', $entidad->id) }}">Ver</a></td>
            			</tr>
            		@endforeach            		
            	</tbody>
            </table>
        </div>
    </div>
</div>
@endsection