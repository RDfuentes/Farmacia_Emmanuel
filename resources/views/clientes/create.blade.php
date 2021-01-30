@extends ('layouts.vistas')
@section ('contenido')

	<h3 class="text-center"><strong>Nuevo cliente</strong></h3><br>

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
			{!!Form::open(array('url'=>'clientes','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

	<div class="row">
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
            	<label for="nombre">Nombre del cliente</label>
            	<input type="text" name="nombre" value="{{old('nombre')}}"  class="form-control" placeholder="Nombre">
            </div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
            	<label for="apellido">Apellido del cliente</label>
            	<input type="text" name="apellido" value="{{old('apellido')}}"  class="form-control" placeholder="Apellido">
            </div>
		</div>
		<div class="col-lg-12 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
            	<label for="direccion">Direccion del cliente</label>
            	<input type="text" name="direccion" value="{{old('direccion')}}" class="form-control" placeholder="Direccion">
            </div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
            	<label for="telefono1">Telefono principal</label>
            	<input type="number" name="telefono1" value="{{old('telefono1')}}" class="form-control" placeholder="Telefono principal">
            </div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
            	<label for="telefono2">Telefono secundario</label>
            	<input type="number" name="telefono2" value="{{old('telefono2')}}" class="form-control" placeholder="Telefono secundario">
            </div>
		</div>

		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
				<button class="btn btn-primary" type="submit">Guardar</button>
            	<a class="btn btn-danger" href="{{ url('/clientes') }}" >Cancelar</a>
            </div>
		</div>

	</div>
			{!!Form::close()!!}		
@endsection