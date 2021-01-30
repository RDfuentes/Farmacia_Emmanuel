@extends ('layouts.vistas')
@section ('contenido')
<div class="row"> 
	<div class="col-xs-12 col-md-12 col-sm-12 col-xs-12">
	<h3 class="text-center"><strong>Productos</strong><br><br>
	<a href="productos/create"><button class="btn btn-success">Nuevo producto</button></a>
	</h3><br>
		@include('productos.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table id="" class="table table-striped table-bordered table-condensed table-hover" rules="groups" frame="hsides">
				<thead>
					<th>Id</th>
					<th>Nombre producto</th>
					<th>Categoria</th>
					<th>Codigo</th>
					<th>Proveedor</th>
					<th>Costo</th>
					<th>Venta</th>
					<th>Vencimiento</th>
					<th>Opciones</th>
				</thead>
               @foreach ($productos as $prod)
				<tr>
					<td>{{ $prod->id_producto}}</td>
					<td>{{ $prod->nombre}}</td>
					<td>{{ $prod->categorias}}</td>
					<td>{{ $prod->codigo}}</td>
					<td>{{ $prod->proveedores}}</td>
					<td>{{ $prod->costo}}</td>
					<td>{{ $prod->venta}}</td>
					<td>{{ $prod->vencimiento}}</td>

					<td>
						<a href="{{URL::action('ProductosController@edit',$prod->id_producto)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$prod->id_producto}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('productos.modal')
				@endforeach
			</table>
		</div>

		<div class="container">
			<div>
			<a class="btn btn-block" style="background-color:#ff3333; color:white;" href="{{ url('inicio') }}">REGRESAR</a>
			</div>
		</div>

		{{$productos->render()}}
	</div>
</div>

@endsection