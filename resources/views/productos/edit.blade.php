@extends ('layouts.vistas')
@section ('contenido')

			<div class="row">
				<div class="col-lg-6 col-sm-4 col-md-4 col-xs-12">
					<h3 class="text-center"><strong>Editar producto:</strong> {{ $productos->nombre}}</h3><br>
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

			{!!Form::model($productos,['method'=>'PATCH','route'=>['productos.update',$productos->id_producto]])!!}
            {{Form::token()}}
			<div class="row">

				
				<div class="col-lg-6 col-sm-4 col-md-4 col-xs-12">
					<div class="form-group">
						<label for="nombre">Nombre</label>
						<input type="text" name="nombre" value="{{$productos->nombre}}"  class="form-control" placeholder="Nombre del producto">
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
					<label for="">Categoria</label>
						<select name="id_categoria" id="" class="form-control">
							@foreach ($categorias as $cat)
								@if($cat->id_categoria==$productos->id_categoria)
								<option value="{{$cat->id_categoria}}" selected>{{$cat->nombre}}</option>
								@else
								<option value="{{$cat->id_categoria}}">{{$cat->nombre}}</option>
								@endif 	
							@endforeach
						</select>
					</div>
				</div>

				<div class="col-lg-6 col-sm-4 col-md-4 col-xs-12">
					<div class="form-group">
						<label for="descripcion">Descripcion</label>
						<input type="text" name="descripcion" value="{{$productos->descripcion}}" class="form-control" placeholder="Descripcion">
					</div>
				</div>

				<div class="col-lg-6 col-sm-4 col-md-4 col-xs-12">
					<div class="form-group">
						<label for="codigo">Codigo</label>
						<input type="text" name="codigo" value="{{$productos->codigo}}" class="form-control" placeholder="Codigo del producto">
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
					<label for="">Proveedor</label>
						<select name="id_proveedor" id="" class="form-control">
							@foreach ($proveedores as $pro)
								@if($pro->id_proveedor==$productos->id_proveedor)
								<option value="{{$pro->id_proveedor}}" selected>{{$pro->nombre}}</option>
								@else
								<option value="{{$pro->id_proveedor}}">{{$pro->nombre}}</option>
								@endif 	
							@endforeach
						</select>
					</div>
				</div>

				<div class="col-lg-6 col-sm-4 col-md-4 col-xs-12">
					<div class="form-group">
						<label for="costo">Precio costo</label>
						<input type="number" name="costo" value="{{$productos->costo}}" class="form-control" placeholder="Precio costo">
					</div>
				</div>

				<div class="col-lg-6 col-sm-4 col-md-4 col-xs-12">
					<div class="form-group">
						<label for="venta">Precio venta</label>
						<input type="number" name="venta" value="{{$productos->venta}}" class="form-control" placeholder="Precio venta">
					</div>
				</div>

				<div class="col-lg-6 col-sm-4 col-md-4 col-xs-12">
					<div class="form-group">
						<label for="vencimiento">Fecha de vencimiento</label>
						<input type="date" name="vencimiento" value="{{$productos->vencimiento}}" class="form-control" placeholder="Fecha de vencimiento">
					</div>
				</div>

				<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
					<div class="form-group">
						<button class="btn btn-success" type="submit">Guardar</button>
						<a class="btn btn-danger" href="{{ url('/productos') }}" >Regresar</a>
					</div>
				</div>

			</div>

			{!!Form::close()!!}		
            
		</div>
	</div>
@endsection