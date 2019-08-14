@extends('layouts.app')
@section('title','Trainers Create')
@section('content')
{!!Form::open(['route'=>'trainers.store','method'=>'POST','files'=>true])!!}
	@include('trainers.form')
	{!!Form::submit('Guardar',['class'=>'btn btn-primary'])!!}
{!!Form::close()!!}
<form class="form-group" method="POST" action="/trainers" enctype="multipart/form-data" files="true">
	@csrf
<div class="form-group">
	<label for="nombre">Nombre:</label>
	<input type="text" name="name" class="form-control">
</div>
<div class="form-group">
  <label for="description">descripcion</label>
  <textarea class="form-control rounded-0" name="description" rows="3"></textarea>
</div>
<div class="form-group">
	<label for="avatar">Avatar:</label>
	<input type="file" name="avatar" class="form-control-file">
</div>
<button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection