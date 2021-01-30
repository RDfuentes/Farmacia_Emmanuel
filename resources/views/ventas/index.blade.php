@extends ('layouts.vistas')
@section ('contenido')
<div class="row"> 
	<div class="col-xs-12 col-md-12 col-sm-12 col-xs-12">
	<h3 class="text-center"><strong>Ventas</strong><br><br>
	<a href="ventas/create"><button class="btn btn-success">Generar nueva venta</button></a>
	</h3><br>
		@include('ventas.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table id="" class="table table-striped table-bordered table-condensed table-hover" rules="groups" frame="hsides">
				<thead>
					<th>Id</th>
					<th>Cliente</th>
					<th>Producto</th>
					<th>Cantidad</th>
					<th>Precio</th>
					<th>Descripcion</th>
					<th>Opciones</th>
				</thead>
               @foreach ($ventas as $ven)
				<tr>
					<td>{{ $ven->id_venta}}</td>
					<td>{{ $ven->clientes." ".$ven->clientess}}</td>
					<td>{{ $ven->productos." ".$ven->productoss}}</td>
					<td>{{ $ven->cantidad}}</td>
					<td>{{ $ven->precio}}</td>
					<td>{{ $ven->descripcion}}</td>
					<td>{{ $ven->cantidad}}</td>

					<td>
						<a href="{{URL::action('VentasController@edit',$ven->id_venta)}}"><button class="btn btn-info">Ver</button></a>
                         <a href="" data-target="#modal-delete-{{$ven->id_venta}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('ventas.modal')
				@endforeach
			</table>
		</div>

		<div class="container">
			<div>
			<a class="btn btn-block" style="background-color:#ff3333; color:white;" href="{{ url('inicio') }}">REGRESAR</a>
			</div>
		</div>

		{{$ventas->render()}}
	</div>
</div>

@endsection