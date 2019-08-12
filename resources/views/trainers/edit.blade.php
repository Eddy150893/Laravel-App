@extends('layouts.app')
@section('title','Trainers Edit')
@section('content')
<form class="form-group" method="POST" action="/trainers/{{$trainer->slug}}" enctype="multipart/form-data" files="true">
	@method('PUT')
	@csrf
<div class="form-group">
	<label for="nombre">Nombre:</label>
	<input type="text" name="name" class="form-control" value="{{$trainer->name}}">
</div>
<div class="form-group">
  <label for="description">descripcion</label>
  <textarea class="form-control rounded-0" name="description" rows="3">{{$trainer->description}}</textarea>
</div>
<div class="form-group">
	<label for="avatar">Avatar:</label>
	<input type="file" name="avatar" class="form-control-file">
</div>
<button type="submit" class="btn btn-primary">Actualizar</button>
</form>
@endsection