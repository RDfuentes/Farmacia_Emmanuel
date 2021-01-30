@extends ('layouts.vistas')
@section ('contenido')

	<div class="row">
		<div class="col-xs-12 col-xs-12 col-md-12 col-sm-12 col-xs-12">
			<h3 class="text-center"><strong>Venta numero:</strong> {{ $ventas->id_venta}}</h3><br>
		</div>
	</div>

			{!!Form::model($ventas,['method'=>'PATCH','route'=>['ventas.update',$ventas->id_venta]])!!}
            {{Form::token()}}
			<div class="row">

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
					<label for="">Cliente</label>
						<label name="id_cliente" id="" class="form-control" readonly="readonly" >
							@foreach ($clientes as $cli)
								@if($cli->id_cliente==$ventas->id_cliente)
								<option value="{{$cli->nombre}}" selected>{{$cli->nombre." ".$cli->apellido}}</option>
								@endif 	
							@endforeach
						</label>
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
					<label for="">Producto</label>
						<label name="id_producto" id="" class="form-control" readonly="readonly">
							@foreach ($productos as $pro)
								@if($pro->id_producto==$ventas->id_producto)
								<option value="{{$pro->id_producto}}" selected>{{$pro->nombre." ".$pro->codigo}}</option>
								@endif 	
							@endforeach
						</label>
					</div>
				</div>


				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="cantidad">Cantidad</label>
						<input type="number" name="cantidad" readonly="readonly" value="{{$ventas->cantidad}}" class="form-control">
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<label for="precio">Precio</label>
						<input type="number" name="precio" readonly="readonly" value="{{$ventas->precio}}" class="form-control">
					</div>
				</div>

				<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
					<div class="form-group">
						<label for="descripcion">Descripcion</label>
						<input type="text" name="descripcion" readonly="readonly" value="{{$ventas->descripcion}}"onkeypress="return soloLetras(event)"  class="form-control" placeholder="Descripcion del pedido">
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<button class="btn btn-success" type="submit">Imprimir</button>
						<a class="btn btn-danger" href="{{ url('/ventas') }}" >Regresar</a>
					</div>
				</div>

			</div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection