@extends ('layouts.vistas')
@section ('contenido')

	<h3 class="text-center"><strong>Editar Proveedor:</strong> {{ $proveedores->nombre}}</h3><br>
	
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

			{!!Form::model($proveedores,['method'=>'PATCH','route'=>['proveedores.update',$proveedores->id_proveedor]])!!}
            {{Form::token()}}
			<div class="row">

			<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
            	<label for="nombre">Nombre de la empresa</label>
            	<input type="text" name="nombre" value="{{$proveedores->nombre}}"  class="form-control" placeholder="Nombre">
            </div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
            	<label for="direccion">Direccion del proveedor</label>
            	<input type="text" name="direccion" value="{{$proveedores->direccion}}"  class="form-control" placeholder="Direccion">
            </div>
		</div>
		<div class="col-lg-12 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
            	<label for="correo">Correo electronico</label>
            	<input type="email" name="correo" value="{{$proveedores->correo}}"  class="form-control" placeholder="Apellido">
            </div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
            	<label for="telefono1">Telefono principal</label>
            	<input type="number" name="telefono1" value="{{$proveedores->telefono1}}"  class="form-control" placeholder="Telefono principal">
            </div>
		</div>
		<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
			<div class="form-group">
            	<label for="telefono2">Telefono secundario</label>
            	<input type="number" name="telefono2" value="{{$proveedores->telefono2}}"  class="form-control" placeholder="Telefono secundario">
            </div>
		</div>


				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<button class="btn btn-primary" type="submit">Guardar</button>
						<a class="btn btn-danger" href="{{ url('/proveedores') }}" >Cancelar</a>
					</div>
				</div>

			</div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection