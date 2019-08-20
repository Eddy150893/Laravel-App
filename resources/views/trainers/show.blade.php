@extends('layouts.app')
@section('title','Trainer')
@section('content')
@include('common.success')
	<img style="height: 200px; width: 200px; background-color: #EFEFEF; margin: 20px;" class="card-img-top rounded-circle mx-auto d-block" src="/images/{{$trainer->avatar}}">
	<div class="text-center">
		<h5 class="card-title">{{$trainer->name}}</h5>
		<p class="card-text">{{$trainer->description}}</p>
		<a href="/trainers/{{$trainer->slug}}/edit" class="btn btn-primary">Editar</a>
		{!!Form::open([ 'route' =>['trainers.destroy',$trainer->slug],'method'=>'DELETE'])!!}
		{!!Form::submit('Eliminar',['class'=>'btn btn-danger'])!!}
		{!!Form::close()!!}
	</div>
	
@endsection