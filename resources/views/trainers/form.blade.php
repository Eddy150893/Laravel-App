<div class="form-group">
		{!!Form::label('name','Nombre')!!}
		{!!Form::text('name',null,['class'=>'form-control'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('description','Descripcion')!!}
		{!!Form::textarea('description',null,['class'=>'form-control rounded-0'])!!}
	</div>
	<div class="form-group">
		{!!Form::label('avatar','Avatar')!!}
		{!!Form::file('avatar')!!}
	</div>