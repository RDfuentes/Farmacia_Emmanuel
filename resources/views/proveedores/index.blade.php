@extends ('layouts.vistas')
@section ('contenido')
<div class="row"> 
	<div class="col-xs-12 col-md-12 col-sm-12 col-xs-12">
	<h3 class="text-center"><strong>Proveedores</strong><br><br>
	<a href="proveedores/create"><button class="btn btn-success">Nuevo proveedor</button></a>
	</h3><br>
		@include('proveedores.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table id="" class="table table-striped table-bordered table-condensed table-hover" rules="groups" frame="hsides">
				<thead>
					<th>Id</th>
					<th>Proveedor</th>
					<th>Direccion</th>
					<th>Telefono 1</th>
					<th>Opciones</th>
				</thead>
               @foreach ($proveedores as $pro)
				<tr>
					<td>{{ $pro->id_proveedor}}</td>
					<td>{{ $pro->nombre}}</td>
					<td>{{ $pro->direccion}}</td>
					<td>{{ $pro->telefono1}}</td>

					<td>
						<a href="{{URL::action('ProveedoresController@edit',$pro->id_proveedor)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$pro->id_proveedor}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('proveedores.modal')
				@endforeach
			</table>
		</div>

		<div class="container">
			<div>
			<a class="btn btn-block" style="background-color:#ff3333; color:white;" href="{{ url('inicio') }}">REGRESAR</a>
			</div>
		</div>

		{{$proveedores->render()}}
	</div>
</div>

@endsection