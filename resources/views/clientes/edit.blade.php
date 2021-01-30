@extends ('layouts.vistas')
@section ('contenido')

	<h3 class="text-center"><strong>Editar cliente:</strong> {{ $clientes->nombre}}</h3><br>
	
	<div class="row">
		<div class="col-xs-12">
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

			{!!Form::model($clientes,['method'=>'PATCH','route'=>['clientes.update',$clientes->id_cliente]])!!}
            {{Form::token()}}
			<div class="row">

			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
            	<label for="nombre">Nombre del cliente</label>
            	<input type="text" name="nombre" value="{{$clientes->nombre}}"  class="form-control" placeholder="Nombre">
            </div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
            	<label for="apellido">Apellido del cliente</label>
            	<input type="text" name="apellido" value="{{$clientes->apellido}}"  class="form-control" placeholder="Apellido">
            </div>
		</div>
		<div class="col-lg-12 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
            	<label for="direccion">Direccion del cliente</label>
            	<input type="text" name="direccion" value="{{$clientes->direccion}}"  class="form-control" placeholder="Direccion">
            </div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
            	<label for="telefono1">Telefono principal</label>
            	<input type="number" name="telefono1" value="{{$clientes->telefono1}}"  class="form-control" placeholder="Telefono principal">
            </div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
            	<label for="telefono2">Telefono secundario</label>
            	<input type="number" name="telefono2" value="{{$clientes->telefono2}}"  class="form-control" placeholder="Telefono secundario">
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
            
		</div>
	</div>
@endsection