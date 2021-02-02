@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Obavijest') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('Uspiješno ste se prijavili, možete nastaviti s kupnjom!') }}
                    <br/><br/>
                    <li class="nav-item">
                    

                                <a class="nav-link" href="{{ route('pocetna') }}">Nastavak na pregled proizvoda</a>
                            </li>
                            <br/>

                            @if (session()->get('cart'))
						       <li class="nav-item">
						          <a href="{{ route('cart') }}" class="nav-link"><img src="slike/cart.png" height="25px" />Nastavak na košaricu ({{ count(session()->get('cart')) }}) </a> 
						      </li>
						  @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
