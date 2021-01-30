@extends ('layouts.vistas')
@section ('contenido')

	<div class="row">
		<div class="col-xs-12 col-md-12 col-sm-12 col-xs-12">
			<h3 class="text-center"><strong>Nuevo producto</strong></h3><br>
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
			{!!Form::open(array('url'=>'productos','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}
			
			<div class="row">

				<div class="col-lg-6 col-sm-4 col-md-4 col-xs-12">
					<div class="form-group">
						<label for="nombre">Nombre</label>
						<input type="text" name="nombre" value="{{old('nombre')}}" class="form-control" placeholder="Nombre del producto">
					</div>
				</div>

				<div class="col-lg-6 col-sm-4 col-md-4 col-xs-12">
					<div class="form-group">
						<label for="">Categoria</label>
						<select name="id_categoria" id="" class="form-control">
						<option value="">-- SELECCIONE CATEGORIA --</option>
						@foreach ($categorias as $cat)
						<option value="{{$cat->id_categoria}}">{{$cat->nombre}}</option>
						@endforeach
						</select>
					</div>	
				</div>

				<div class="col-lg-6 col-sm-4 col-md-4 col-xs-12">
					<div class="form-group">
						<label for="descripcion">Descripcion</label>
						<input type="text" name="descripcion" value="{{old('descripcion')}}" class="form-control" placeholder="Descripcion">
					</div>
				</div>

				<div class="col-lg-6 col-sm-4 col-md-4 col-xs-12">
					<div class="form-group">
						<label for="codigo">Codigo</label>
						<input type="text" name="codigo" value="{{old('codigo')}}" class="form-control" placeholder="Codigo del producto">
					</div>
				</div>

				<div class="col-lg-6 col-sm-4 col-md-4 col-xs-12">
					<div class="form-group">
						<label for="">Proveedor</label>
						<select name="id_proveedor" id="" class="form-control">
						<option value="">-- SELECCIONE PROVEEDOR --</option>
						@foreach ($productos as $pro)
						<option value="{{$pro->id_proveedor}}">{{$pro->nombre}}</option>
						@endforeach
						</select>
					</div>	
				</div>


				<div class="col-lg-6 col-sm-4 col-md-4 col-xs-12">
					<div class="form-group">
						<label for="costo">Precio costo</label>
						<input type="number" name="costo" value="{{old('costo')}}" class="form-control" placeholder="Precio costo">
					</div>
				</div>

				<div class="col-lg-6 col-sm-4 col-md-4 col-xs-12">
					<div class="form-group">
						<label for="venta">Precio venta</label>
						<input type="number" name="venta" value="{{old('venta')}}" class="form-control" placeholder="Precio venta">
					</div>
				</div>

				<div class="col-lg-6 col-sm-4 col-md-4 col-xs-12">
					<div class="form-group">
						<label for="vencimiento">Fecha de vencimiento</label>
						<input type="date" name="vencimiento" value="{{old('vencimiento')}}" class="form-control" placeholder="Fecha de vencimiento">
					</div>
				</div>

			</div><br>

			<div class="text-center">
				<div class="form-group">
					<button class="btn btn-primary" type="submit">Guardar</button>
					<a class="btn btn-danger" href="{{ url('/productos') }}" >Cancelar</a>
				</div>
			</div>
			
			{!!Form::close()!!}		
@endsection