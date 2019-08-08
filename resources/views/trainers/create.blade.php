@extends('layouts.app')
@section('title','Trainers Create')
@section('content')
<form class="form-group" method="POST" action="/trainers" enctype="multipart/form-data" files="true">
	@csrf
<div class="form-group">
	<label for="nombre">Nombre:</label>
	<input type="text" name="name" class="form-control">
</div>
<div class="form-group">
	<label for="avatar">Avatar:</label>
	<input type="file" name="avatar" class="form-control-file">
</div>
<button type="submit" class="btn btn-primary">Guardar</button>
</form>
@endsection