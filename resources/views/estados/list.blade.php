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
            <legend class="col-xs-12 title_page_label" style="margin-top: 1vh;">Nuevo Estado</legend>
            <div id="estados-nuevo-estado" class="col-xs-12" style="min-height: 200px;">
                {!! Form::open(['route' => 'estados.store', 'method' => 'POST', 'files' => true]) !!}
                    <div class="form-group row">
                        {!! Form::label('nombre_estado', 'Estado', ['class' => ['col-xs-12 col-sm-6', 'col-form-label', 'text-left']] ) !!}

                        <div class="col-xs-12 col-sm-6">
                            {!! Form::text('nombre_estado', null, ['id' => 'nombre_estado', 'class' => ['form-control'], 'onkeyup' => 'cambiarEspaciosPorUnderline("nombre_estado", "texto_estado")', 'required' => true ]) !!}
                        </div>
                    </div>
                    <div class="form-group row" style="/*display: none;">
                        {!! Form::label('texto_estado', 'Texto código', ['class' => ['col-xs-12', 'col-sm-6', 'col-form-label', 'text-left']] ) !!}

                        <div class="col-xs-12 col-sm-6">
                            {!! Form::text('texto_estado', null, ['id' => 'texto_estado', 'class' => ['form-control'], 'readonly' => true ]) !!}
                        </div>
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
            <legend id="label_listado_estados" class="col-xs-12 title_page_label" style="margin-top: 1vh;">Listado de estados ({{ count($estados) }})</legend>
            <table class="table table-responsive">
            	<thead>
            		<th>Id</th>
                    <th>Nombre de estado</th>
                    <th>Texto del código</th>
            		<th class="text-center">Acciones</th>
            	</thead>
            	<tbody>
            		@foreach($estados as $estado)
            			<tr class="fila">
            				<td>{{ $estado->id }}</td>
                            <td>{{ $estado->nombre_estado }}</td>
                            <td>{{ $estado->texto_estado }}</td>
            				<td class="text-center"><a href="{{ route('estados.show', $estado->id) }}">Ver</a></td>
            			</tr>
            		@endforeach
            	</tbody>
            </table>
        </div>
    </div>
</div>
@endsection