@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Profil korisnika</h1>
	
	<table class="table">
	   <tr><th>Ime i prezime: </th><td>{{ Auth::user()->name }} {{ Auth::user()->surname }} </td></tr>
	   <tr><th>E-mail: </th><td>{{ Auth::user()->email }} </td></tr>
	   <tr><th>Spol: </th><td>{{ Auth::user()->gender==1?'Žensko':'Muško' }} </td></tr>
	   <tr><th>Uloga: </th><td>{{ Auth::user()->role==1?'Kupac':'Administrator' }} </td></tr>
	   <tr><th>Datum registracije: </th><td>{{strftime('%d.%m.%G. %H:%M',strtotime(Auth::user()->created_at)) }} </td></tr>
	</table>
	
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Promjena lozinke</div>

                <div class="card-body">
                    <form method="POST" action="changepass">
                        @csrf
                        
			           <div class="form-group row">
                            <label for="password1" class="col-md-4 col-form-label text-md-right">Stara lozinka</label>

                            <div class="col-md-3">
                                <input id="password1" type="password" class="form-control" name="oldpassword" required autocomplete="new-password">


                            </div>
                        </div>			
						
                      

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Nova lozinka</label>

                            <div class="col-md-3">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Potvrda nove lozinke</label>

                            <div class="col-md-3">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Promjeni lozinku
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <script>
        var msg = "{{Session::get('alert')}}";
        var exist = "{{Session::has('alert')}}";
        if(exist){
        alert(msg);
        }
    </script>

@endsection