@extends ('layouts.vistas')
@section ('contenido')
<div class="row"> 
	<div class="col-xs-12 col-md-12 col-sm-12 col-xs-12">
	<h3 class="text-center"><strong>Categorias</strong><br><br>
	<a href="categorias/create"><button class="btn btn-success">Nueva categoria</button></a>
	</h3><br>
		@include('categorias.search')
	</div>
</div>

<div class="row">
	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
		<div class="table-responsive">
			<table id="" class="table table-striped table-bordered table-condensed table-hover" rules="groups" frame="hsides">
				<thead>
					<th>Id</th>
					<th>Nombre</th>
					<th>Descripcion</th>
					<th>Opciones</th>
				</thead>
               @foreach ($categorias as $cat)
				<tr>
					<td>{{ $cat->id_categoria}}</td>
					<td>{{ $cat->nombre}}</td>
					<td>{{ $cat->descripcion}}</td>

					<td>
						<a href="{{URL::action('CategoriasController@edit',$cat->id_categoria)}}"><button class="btn btn-info">Editar</button></a>
                         <a href="" data-target="#modal-delete-{{$cat->id_categoria}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
					</td>
				</tr>
				@include('categorias.modal')
				@endforeach
			</table>
		</div>

		<div class="container">
			<div>
			<a class="btn btn-block" style="background-color:#ff3333; color:white;" href="{{ url('inicio') }}">REGRESAR</a>
			</div>
		</div>

		{{$categorias->render()}}
	</div>
</div>

@endsection