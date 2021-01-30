@extends('layouts.admin')
@section('content')

<script src="https://code.jquery.com/jquery-3.2.1.js"></script>

<script type="text/javascript">
$(document).ready(function(){
    $("#clientefrecuente").on('click', function() {
        $("#mostrarclientefrecuente").show();
        return false;
    });
});
</script>


<section>
    <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
        <div class="text-center">
            <h2 style="color:#9C9C9C"> B I E N V E N I D O S </h2> 
        </div>
        <p class="text-center">FARMACIA EMMANUEL</p>
    </div>

    <div class="row">
        <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
            <div class="form-group">
                <a href="/ventas" class="btn btn-danger btn-block" autofocus> VENTAS </a>
            </div>
        </div>
    </div>

</section>

<section>
    <div class="col-lg-12">
        <div class="row">

                
                <div class="col-lg-3 col-sm-3 col-md-4 col-xs-12">
                <div class="form-group">
                        <div class="text-center"><br>
                        <a href="/clientes"><button autofocus class="btn btn-link btn btn-block"><img src="{{asset('images/clientes.png')}}" style='width:6cm; height:6cm'></button></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-3 col-md-4 col-xs-12">
                <div class="form-group">
                        <div class="text-center"><br>
                        <a href="/categorias"><button autofocus class="btn btn-link btn btn-block"><img src="{{asset('images/categorias.png')}}" style='width:6cm; height:6cm'></button></a>
                        </div>
                    </div>
                </div>


                <div class="col-lg-3 col-sm-3 col-md-4 col-xs-12">
                <div class="form-group">
                        <div class="text-center"><br>
                        <a href="/proveedores"><button autofocus class="btn btn-link btn btn-block"><img src="{{asset('images/proveedores.png')}}" style='width:6cm; height:6cm'></button></a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-3 col-md-4 col-xs-12">
                <div class="form-group">
                        <div class="text-center"><br>
                        <a href="/productos"><button autofocus class="btn btn-link btn btn-block"><img src="{{asset('images/productos.png')}}" style='width:6cm; height:6cm'></button></a>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>

<a href="https://api.whatsapp.com/send?phone=50200000000&text=Farmacia&nbsp;Emmanuel" target="_blank" class="appWhatsapp">
<img src="{{asset('images/whatsapp.png')}}" alt="whatsapp">
</a>

<style>
.appWhatsapp{
    position: fixed;
    right: 26px;
    bottom: 100px;
    width: 60px;
    z-index:1000;
}

.appWhatsapp img{
    width: 100%;
    heigth:auto;
}
</style>

@endsection
