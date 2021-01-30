@extends ('layouts.vistas')
@section ('contenido')

	<h3 class="text-center"><strong>Nueva categoria</strong></h3><br>

	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			@if (count($errors)>0)
			<div class="alert alert-danger">
				<ul>
				@foreach ($errors->all() as $error)
					<li>{{$error}}</li>
				@endforeach
				</ul>
			</div>
			@endif
		</div>
	</div>
			{!!Form::open(array('url'=>'categorias','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

	<div class="row">
		<div class="col-lg-12 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
            	<label for="nombre">Nombre de la categoria</label>
            	<input type="text" name="nombre" value="{{old('nombre')}}"  class="form-control" placeholder="Nombre">
            </div>
		</div>
		<div class="col-lg-12 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
            	<label for="descripcion">Descripcion de la categoria</label>
            	<input type="text" name="descripcion" value="{{old('descripcion')}}" class="form-control" placeholder="Descripcion">
            </div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
            	<a class="btn btn-danger" href="{{ url('/categorias') }}" >Cancelar</a>
            </div>
		</div>

	</div>
			{!!Form::close()!!}		
@endsection