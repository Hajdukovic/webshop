<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
	
    <!-- Styles -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
    <script src="https://www.kryogenix.org/code/browser/sorttable/sorttable.js"></script>
</head>
<body>
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
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">Prijava</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">Registracija</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('history') }}">Moja povijest kupnje</a>
                            </li>
							
							@if (Auth::user()->role==2)
							<li class="nav-item">
                                <a class="nav-link" href="{{ route('historyAdmin') }}">Povijest kupnje</a>
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
						 <div style="position:relative; left:200px;">
						  @if (session()->get('cart'))
						       <li class="nav-item">
						          <a href="{{ route('cart') }}"><img src="./slike/cart.png" height="40px" /></a> ({{ count(session()->get('cart')) }})
						      </li>
						  @else
							  <li class="nav-item">
						          <img src="./slike/cart.png" height="30px" /> prazna
						      </li>
						  @endif
						 </div>
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>