<!doctype html>
<html lang="en">
  <head>
    <title>EMMANUEL</title>
    <link rel="shortcut icon" href="{{asset('images/logo.png')}}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet"> 

    <link rel="stylesheet" href="{{asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/magnific-popup.css')}}">

    <link rel="stylesheet" href="{{asset('fonts/ionicons/css/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/fontawesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('fonts/flaticon/font/flaticon.css')}}">
    

    <!-- Theme Style -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
  </head>
  <body>

<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12"> 
  <header role="banner">
     
     <nav class="navbar navbar-expand-md navbar-dark bg-light">
       <div class="container">
         <a class="navbar-brand" href="{{ url('/inicio')}}">EMMANUEL</a>
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample05" aria-controls="navbarsExample05" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link active" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>
                
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Salir') }}
                        </a>
                        
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                        </form>    
                    </div>
                </li>
            </ul>
                    
       </div>
     </nav>
   </header>
   <!-- END header -->


   <section>
        <div class="site-hero" style="background-image: url({{asset('images/fondo.jpg')}});"></div>
   </section>
   <!-- END section -->


   <br><br>
   @yield('content')
   <br><br>

   
   <footer class="site-footer">
     <div class="container">
       <div class="row mb-5">
         <div class="col-md-4">
           <h3 class="mb-4">INFORMACIÓN</h3>
           <ul class="list-unstyled ">
             <li class="d-flex"><span class="mr-3"><span class="icon ion-ios-location"></span></span><span class="">San Rafael Pie de la Cuesta, San Marcos.</span></li>
             <li class="d-flex"><span class="mr-3"><span class="icon ion-ios-telephone"></span></span><span class="">+502 0000 0000</span></li>
             <li class="d-flex"><span class="mr-3"><span class="icon ion-email"></span></span><span class="">farmacia.emmanuel@gmail.com</span></li>
           </ul>
         </div>
       </div>
     </div>
   </footer>
   <!-- END footer -->

</div>

    <script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
    <script src="{{asset('js/jquery-migrate-3.0.0.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('js/jquery.stellar.min.js')}}"></script>

    <script src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('js/magnific-popup-options.js')}}"></script>

    <script src="{{asset('js/main.js')}}"></script>
  </body>
</html>