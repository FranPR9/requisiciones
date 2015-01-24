@extends('includes.master')
@section ('title')
  Nueva Requisicion
@stop
@section ('content')
@include('includes.nav')
  <div class="main">
    <div class="row">
      <div class="col-md-7">
        <p class="titulo"><i class="fa fa-archive">Nueva Requisición</i></p>
        <div class="form-group">
          {{ Form::open(array('url' => 'requisiciones')) }}

            {{ Form::select('tipo', array('' => 'Tipo de requisición', 'Bien' => 'Bien', 'Servicio' => 'Servicio'), null, array('class'=>'form-control')) }} <br>

            {{ Form::text('descripcion', Input::old('descripcion'),  array('class'=>'form-control', 'placeholder'=>'Descripcion')) }} <br>

            {{ Form::text('partida_presupuestal', Input::old('partida_presupuestal'),  array('class'=>'form-control', 'placeholder'=>'Partida Presupuestal')) }} <br>

            {{ Form::text('codificacion', Input::old('codificacion'),  array('class'=>'form-control', 'placeholder'=>'Codificación')) }} <br>

            {{ Form::text('presupuesto', Input::old('presupuesto'),  array('class'=>'form-control', 'placeholder'=>'Presupuesto')) }} <br>

            {{ Form::select('origen_recursos', array('' => 'Origen de recursos', 'Estatales' => 'Estatales', 'Propios' => 'Propios', 'Federales' => 'Federales'), null, array('class'=>'form-control')) }} <br>

            {{ Form::select('procedimiento_adjudicacion', array('' => 'Procedimiento  de adjudicación', 'Estatales' => 'Adjudicación Directa', 'Propios' => 'Invitación a cuando menos tres', 'Federales' => 'Licitación '), null, array('class'=>'form-control')) }} <br>

            {{ Form::text('tiempo_entrega', Input::old('tiempo_entrega'),  array('class'=>'form-control', 'placeholder'=>'Tiempo de entrega')) }} <br>

            {{ Form::text('lugar_entrega', Input::old('lugar_entrega'),  array('class'=>'form-control', 'placeholder'=>'Lugar de entrega')) }} <br>

            {{ Form::text('garantia', Input::old('garantia'),  array('class'=>'form-control', 'placeholder'=>'Garantía')) }} <br>

            {{ Form::text('asesor', Input::old('asesor'),  array('class'=>'form-control', 'placeholder'=>'Asesor')) }} <br>

            {{ Form::text('cargo_asesor', Input::old('cargo_asesor'),  array('class'=>'form-control', 'placeholder'=>'Cargo del asesor')) }} <br>

            {{ Form::text('correo_asesor', Input::old('correo_asesor'),  array('class'=>'form-control', 'placeholder'=>'Correo de asesor')) }} <br>

            {{ Form::text('dias_pago', Input::old('dias_pago'),  array('class'=>'form-control', 'placeholder'=>'Días para pago')) }} <br>

            {{ Form::textarea('observaciones', Input::old('observaciones'),  array('class'=>'form-control', 'size' => '50x3','placeholder'=>'Observaciones')) }} <br>
            
            {{ Form::submit('Guardar', array('class'=>'btn btn-primary'))}}
          {{ Form::close() }}
        </div>
      </div>
      <div class="col-md-5">
        @if ($errors->has())
        <div class="alert alert-danger">
          <p class="titulo"><i class="fa fa-exclamation-triangle">Datos Incompletos</i></p>
        </div>
        <ul class="list-group">
          @foreach ($errors->all() as $error)
            <li class="list-group-item">{{$error}}</li>
          @endforeach
        </ul>
        @endif
        <p class="titulo"><i class="fa fa-building">Datos Dependencia</i></p>
      </div>
    </div>
  </div>
@stop
@section('scriptsjs')
@stop
