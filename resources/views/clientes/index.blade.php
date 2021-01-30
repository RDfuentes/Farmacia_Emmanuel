@extends ('layouts.vistas')
@section ('contenido')
<div class="row"> 
	<div class="col-xs-12 col-md-12 col-sm-12 col-xs-12">
	<h3 class="text-center"><strong>Clientes</strong><br><br>
	<a href="clientes/create"><button class="btn btn-success">Nuevo Cliente</button></a>
	</h3><br>
		@include('clientes.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table id="" class="table table-striped table-bordered table-condensed table-hover" rules="groups" frame="hsides">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Apellido</th>
					<th>Direccion</th>
					<th>Telefono 1</th>
					<th>Telefono 2</th>
					<th>Opciones</th>
				</thead>
               @foreach ($clientes as $cli)
				<tr>
					<td>{{ $cli->id_cliente}}</td>
					<td>{{ $cli->nombre}}</td>
					<td>{{ $cli->apellido}}</td>
					<td>{{ $cli->direccion}}</td>
					<td>{{ $cli->telefono1}}</td>
					<td>{{ $cli->telefono2}}</td>

					<td>
						<a href="{{URL::action('ClientesController@edit',$cli->id_cliente)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$cli->id_cliente}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('clientes.modal')
				@endforeach
			</table>
		</div>

		<div class="container">
			<div>
			<a class="btn btn-block" style="background-color:#ff3333; color:white;" href="{{ url('inicio') }}">REGRESAR</a>
			</div>
		</div>

		{{$clientes->render()}}
	</div>
</div>

@endsection