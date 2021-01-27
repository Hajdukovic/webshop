<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'V  O  L  T  O') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('http://localhost/webshop/resources/js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	
    <!-- Styles -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="{{ asset('http://localhost/webshop/resources/css/app.css') }}" rel="stylesheet">
	<style>
	    .row {
			padding: 5px;
		}
		.nav-item a{
            display:inline-block;
            text-align: left;
            margin-left: 5px;
        }
	</style>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
</head>
<body>
<div class="row" style="background-color:black; color:white;">
      <div class="col-md-6" style="font-size:11px;text-transform:uppercase;font-weight:400;line-height:24px;text-align:left;">
        <span style="margin-right: 30px;">30-DNEVNO PRAVO NA POVRAT PROIZVODA</span>
        <span>Kontaktirajte nas: <a href="tel:+38551770733" title="091 607 222" style="color: #ffffff;"><b>051 770 733</b></a></span>
      </div>
      <div class="col-md-6" style="font-size:11px;text-align:right;font-weight:400;line-height:24px;">
        <span>Pošaljite e-mail na adresu <a href="mailto:info@volino.hr" title="info@volino.hr"><b>info@volto.hr</b></a></span>
      </div>
    </div>

    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        <li class="nav-item">
                                <a class="nav-link" href="{{ route('pocetna') }}">Trgovina</a>
                            </li>
                            
                        @guest

                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Prijava</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Kreirajte korisnički račun</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('history') }}">Povijest kupnje</a>
                            </li>
							
							@if (Auth::user()->role==2)
							<li class="nav-item">
                                <a class="nav-link" href="{{ route('historyAdmin') }}">Sve kupnje</a>
                            </li>
						    @endif
									
							<li class="nav-item">
							    <a class="nav-link">Prijavljen:</a>
							</li>
							<li>
                                <a class="nav-link" href="{{ route('profil') }}">{{ Auth::user()->name }} {{ Auth::user()->surname }} </a>
                            </li>
                        								
                            <li class="nav-item">
						        <form id="logout-form" action="{{ route('logout') }}" method="POST">
								     @csrf
									   <a class="nav-link" href="" 
									   onclick="event.preventDefault();document.getElementById('logout-form').submit();" >Odjava</a>
								</form>
                            </li>
					
                   
                        @endguest
						 
						  @if (session()->get('cart'))
						       <li class="nav-item">
						          <a href="{{ route('cart') }}" class="nav-link"><img src="slike/cart.png" height="25px" />Košarica ({{ count(session()->get('cart')) }}) </a> 
						      </li>
						  @else
							  <li class="nav-item">
						         <p class="nav-link"> <img src="slike/cart.png" height="20px" /> Košarica prazna </p>
						      </li>
						  @endif
						 
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>


    <!-- Footer -->
  <footer class="bg-white">
    <div class="container py-5">
      <div class="row py-4">
        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0"><img src="img/logo.png" alt="" width="180" class="mb-3">
          <p class="font-italic text-muted">"Iako imamo slobodu da mislimo i djelujemo, mi se držimo zajedno, poput zvijezda na nebeskom svodu s nerazdvojnim vezama. Ove veze ne mogu se vidjeti, ali ih možemo osjetiti." Tesla</p>
          <!-- <ul class="list-inline mt-4">
            <li class="list-inline-item"><a href="#" target="_blank" title="twitter"><i class="fa fa-twitter"></i></a></li>
            <li class="list-inline-item"><a href="#" target="_blank" title="facebook"><i class="fa fa-facebook"></i></a></li>
            <li class="list-inline-item"><a href="#" target="_blank" title="instagram"><i class="fa fa-instagram"></i></a></li>
            <li class="list-inline-item"><a href="#" target="_blank" title="pinterest"><i class="fa fa-pinterest"></i></a></li>
            <li class="list-inline-item"><a href="#" target="_blank" title="vimeo"><i class="fa fa-vimeo"></i></a></li>
          </ul> -->
        </div>
        <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
          <h6 class="text-uppercase font-weight-bold mb-4">O nama</h6>
          <ul class="list-unstyled mb-0">
            <li class="mb-2"><a href="#" class="text-muted">O nama</a></li>
            <li class="mb-2"><a href="#" class="text-muted">Plaćanje i dostava</a></li>
            <li class="mb-2"><a href="#" class="text-muted">Opći uvjeti poslovanja</a></li>
            <li class="mb-2"><a href="#" class="text-muted">Izjava o privatnosti</a></li>
            <li class="mb-2"><a href="#" class="text-muted">Kontaktirajte nas</a></li>
          </ul>
        </div>
        <div class="col-lg-2 col-md-6 mb-4 mb-lg-0">
          <h6 class="text-uppercase font-weight-bold mb-4">Trgovina</h6>
          <ul class="list-unstyled mb-0">
            <li class="mb-2"><a href="login" class="text-muted">Prijava</a></li>
            <li class="mb-2"><a href="register" class="text-muted">Registracija</a></li>
            <li class="mb-2"><a href="{{ route('pocetna') }}" class="text-muted">Kupnja</a></li>
          </ul>
        </div>
        <div class="col-lg-4 col-md-6 mb-lg-0">
          <h6 class="text-uppercase font-weight-bold mb-4">KONTAKT</h6>
          <p class="text-muted mb-4">Unesite kontakt podatke i u slučaju problema javiti ćemo Vam se u najkraćem roku!</p>
          <div class="p-1 rounded border">
            <div class="input-group">
              <input type="email" placeholder="Unesite e-mail / telefon" aria-describedby="button-addon1" class="form-control border-0 shadow-0">
              <div class="input-group-append">
                <button id="button-addon1" type="submit" class="btn btn-link"><i class="fa fa-paper-plane"></i></button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Copyrights -->
    <div class="bg-light py-4">
      <div class="container text-center">
        <p class="text-muted mb-0 py-2">© 2021 Volto internet trgovina. Sva prava pridržana. Izrada: Poslovne usluge Hajduković</p>
      </div>
    </div>
  </footer>
  <!-- End -->
</body>
</html>