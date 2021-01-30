@extends ('layouts.vistas')
@section ('contenido')

	<div class="row">
		<div class="col-xs-12 col-md-12 col-sm-12 col-xs-12">
			<h3 class="text-center"><strong>Nueva venta</strong></h3><br>
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
			{!!Form::open(array('url'=>'ventas','method'=>'POST','autocomplete'=>'off'))!!}
            {{Form::token()}}

			<div class="row">
				<div class="col-lg-6 col-sm-4 col-md-4 col-xs-12">
					<div class="form-group">
						<label for="">Cliente</label>
						<select name="id_cliente" id="" class="form-control">
						<option value="">-- SELECCIONE CLIENTE --</option>
						@foreach ($clientes as $cli)
						<option value="{{$cli->id_cliente}}">{{$cli->nombre." ".$cli->apellido}}</option>
						@endforeach
						</select>
					</div>	
				</div>

				<div class="col-lg-6 col-sm-4 col-md-4 col-xs-12">
					<div class="form-group">
						<label for="">Producto</label>
						<select name="id_producto" id="" class="form-control">
						<option value="">-- SELECCIONE PRODUCTO --</option>
						@foreach ($productos as $pro)
						<option value="{{$pro->id_producto}}">{{$pro->nombre." ".$pro->codigo}}</option>
						@endforeach
						</select>
					</div>	
				</div>

				<div class="col-lg-6 col-sm-4 col-md-4 col-xs-12">
					<div class="form-group">
						<label for="cantidad">Cantidad</label>
						<input type="number" name="cantidad" value="{{old('cantidad')}}" class="form-control" placeholder="Cantidad de productos a vender">
					</div>
				</div>

				<div class="col-lg-6 col-sm-4 col-md-4 col-xs-12">
					<div class="form-group">
						<label for="precio">Precio</label>
						<input type="number" name="precio" value="{{old('precio')}}" class="form-control" placeholder="Precio total de venta">
					</div>
				</div>

				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<div class="form-group">
						<label for="descripcion">Descripcion</label>
						<input type="text" name="descripcion" value="{{old('descripcion')}}" onkeypress="return soloLetras(event)"  class="form-control" placeholder="Descripcion del pedido">
					</div>
				</div>
			</div><br>

			<div class="text-center">
				<div class="form-group">
					<button class="btn btn-primary" type="submit">Guardar</button>
					<a class="btn btn-danger" href="{{ url('/ventas') }}" >Cancelar</a>
				</div>
			</div>
			
			{!!Form::close()!!}		
@endsection